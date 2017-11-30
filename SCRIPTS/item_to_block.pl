#!/usr/bin/perl -w 

use File::Basename;

my $path = "";

($name, $path, $suffix) = fileparse ($0,'');
$script = $name . $suffix;

die "Usage:\n perl $script [debug] [verbose] item_file\n" if $#ARGV < 0 ;

$debug = grep /debug/, @ARGV;
$verbose = grep (/verbose/, (@ARGV));
($input_file) = grep (! (/debug/ || /verbose/), (@ARGV));

($name, $path, $suffix) = fileparse ($input_file,'\.\w+');

$item_file = $name . '.ite';
$justification_file = $name . '.jus';
$block_file = $name . '.blo';

print "input item_file >${item_file}<\n" if ($verbose);
print "input justification_file >${justification_file}<\n" if ($verbose);
print "output block_file >${block_file}<\n" if ($verbose);

open(INP, "<${item_file}");
@item_l=(<INP>);
close INP;

print "item_l:\n@item_l\n" if ($debug);

open(INP, "<${justification_file}");
@justification_l=(<INP>);
close INP;

print "justification_l:\n@justification_l\n" if ($debug);

@block_l = ("item_current_content :", @item_l,
	    "item_current_justification :", @justification_l,
	    "item_previous_content :", "no previous content",
	    "block_previous_sha1 :",
	    "notanyprevioussha1inanynewblockcontent00");

$block_str = join ("\n",@block_l);
print "block_str:\n$block_str\n" if ($debug);

open(OUT, ">$block_file");
print OUT $block_str;
close OUT;

# chown "33", "1001", $block_file;

print " cat ${block_file}\n";

exit;
