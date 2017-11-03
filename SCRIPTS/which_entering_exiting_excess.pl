#!/usr/bin/perl -w 
use File::Basename;

my $path = "";

($name, $path, $suffix) = fileparse ($0,'');
$script = $name . $suffix;

die "Usage:\n perl $script [debug] [verbose] ee_file\n" if $#ARGV < 0 ;

$debug = grep /debug/, @ARGV;
$verbose = grep (/verbose/, (@ARGV));
($ee_file) = grep (! (/debug/ || /verbose/), (@ARGV));

print "ee_file input >${ee_file}<\n" if ($debug);

open(INP, "<${ee_file}");
@Tout=(<INP>);
close INP;

$nam_fun = '';

sub list_of_name_of_list {
    my $my_nam_fun = shift @_;
    my @my_list = @_;

    $reg = quotemeta ($my_nam_fun);
    (@list) = grep (/$reg/, (@my_list));
    $count = $#list;

    print "in list_of_name :";
    print " reg is >$reg<";
    print " count = $count\n" if $verbose;
#	print "found ", join ('', @list) , "\n" if $verbose;

    return $count;    
}

print "nb of lines  = $#Tout\n" if $verbose;

$_ = shift @Tout;

print "\n\ninput $_\n" if $verbose;

if ($_ =~ / entering  in function (\w+)\s*\((\w+)\,\s*(\w+)\)\s*$/) {
    
    print "entering $_\n" if $verbose;
    $nam_fun = $1;
    print "function name >$nam_fun<\n" if $verbose;
    
    $count = &list_of_name_of_list ($nam_fun); 
    print " count = $count\n" if $verbose;
}

exit;

foreach $_ (@Tout) {

    print "nb of lines  = $#Tout\n" if $verbose;
    print "\n\ninput $_\n" if $verbose;

    if ($_ =~ / entering  in function (.*)\s*$/) {

	print "entering $_\n" if $verbose;
	$nam_fun = $1;
	print "function name >$nam_fun<\n" if $verbose;

	$count = &list_of_name_of_list ($nam_fun); 
	print " count = $count\n" if $verbose;
    }

}

exit;
