<?php
/**
 * This script prints documentation status information and 
 * creates a wiki status page.
 * To share this information, please checkin the wiki page
 *  into the svn repository.
 * 
 */
define("MISSING_FILE", -3);
define("FILE_ERROR", -2);
define("MISSING_REVISION", -1);

$docs = getStatus();
doReport($docs);

/**
 * Collect information about documentation files.
 * Returns an array of status information about each document.
 */
function getStatus() {
    $filePattern = '/^(?P<lang>[A-Z][A-Za-z])(?P<doc>.*)\.wiki$/';
    $revisionPattern = 
        '/<wiki:comment>\s*revision:\D*(?P<revision>\d+)\D*<\/wiki:comment>/i';

    $docs = array();
    $languages = array();
	foreach (glob('*.wiki') as $filename) {
	    if (1 != preg_match($filePattern, "$filename", $matches)) {
	        continue;
	    }
	    $lang = $matches['lang'];
	    $doc = $matches['doc'];
	    $result;
	    $buf = file_get_contents($filename);
	    if ($buf == FALSE) {
	        $result = FILE_ERROR;
	    } else if (1 == preg_match($revisionPattern, $buf, $rev)) {
	        $result = $rev['revision'];
	    } else {
	        $result = MISSING_REVISION;
	    }
	    $languages[$lang] = $lang;
	    $docs[$doc][$lang] = $result;
	}
	
	// Find missing files.
	foreach (array_keys($docs) as $doc) {
	    foreach ($languages as $lang) {
	        if (!isset($docs[$doc][$lang])) {
	            $docs[$doc][$lang] = MISSING_FILE;
	        }
	    }
	}
	return $docs;
}

/** 
 * Get the maximum name length.
 */
function getMaxNameLength ($names) {
    $maxLength = 0;
    foreach ($names as $name) {
        $length = strlen($name);
        if ($maxLength < $length) {
            $maxLength = $length;
        }
    }
    return $maxLength;
}
/**
 * Get the top revision number.
 */
function getTopRevision($revisions) {
    $topRevision = 0;
    foreach ($revisions as $rev) {
        if ($rev > $topRevision) {
            $topRevision = $rev;
        }
    }
    return $topRevision;
}
function doReport($docs) {
    $names = array_keys($docs);
    sort($names);
    $languages = array_keys($docs[$names[0]]);
    sort($languages);

    // Formatting.
    $maxNameLength = getMaxNameLength($names);
    $docLineFormat = '%-' . $maxNameLength . 's  |';
    $langTitleLine = sprintf($docLineFormat, ' ');
    foreach($languages as $lang) {
        $langTitleLine .= sprintf(' %2s  |', $lang);
        $docLineFormat .= '  %s  |';
    }
    $docLineFormat .= "\n";
    $lineSeparator = sprintf('%\'-' . strlen($langTitleLine) . 's', '-');
    
    echo $langTitleLine . "\n";
    echo $lineSeparator . "\n";

    $status[] = array_merge((array)'Document', $languages);
    
    foreach($names as $name) {
        $out = array();
        $out[] = empty($name) ? '_Root_' : $name;
        $topRevision = getTopRevision($docs[$name]);
        $doc = $docs[$name];
        foreach ($languages as $lang) {
            switch ($doc[$lang]) {
                case MISSING_FILE: 
                    $out[] = '-';
                    break;
                case FILE_ERROR:
                    $out[] = 'e';
                    break;
                case MISSING_REVISION:
                    $out[] = '?';
                    break;
                default:
                if ($doc[$lang] == $topRevision) {
                    $out[] = ' ';
                } else {
                    $out[] = '+';
                }
            }
        }
        $status[] = $out;
        vprintf($docLineFormat, $out);
    }
    echo $lineSeparator . "\n";
    printLegend();
    createWikiPage($status);
}
function printLegend() {
    echo <<<EndOfLegend
 -  missing file
 +  old revision, has to be updated
 ?  missing revision
 e  error reading file\n
EndOfLegend;
}
function createWikiPage($status) {
    $table[] = '#summary Documentation status. ' . date('d.m.Y') . "\n";
    foreach ($status as $items) {
        $line = '|| ';
        foreach ($items as $item) {
            $line .= $item . ' || ';
        }
        $table[] = $line . "\n";
    }
    file_put_contents('documentationStatus.wiki', $table);
}
?>