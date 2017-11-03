#! /usr/bin/perl -w

open(INPUT, "<test.mw");

my ($line) = "" ;

while (<INPUT>) {
    $line = $_;
    print "\n\nnew line >$line<";
    
    my($item) = '^:\d+(\.)?( [+-])?\s*(.*)$';

    if ($line =~ /$item/) {
	print "FOUND >{$3}< : line = $line";
	
	$line = "  \\item {$3}\n";
	print "REPLACED line = $line";
    }
    else {
	print "NOT FOUND in line $line\n";
    }
    
}

close(INPUT);
exit;
