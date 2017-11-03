#!/usr/bin/perl -w 

use File::Basename;

my $path = "";

($name, $path, $suffix) = fileparse ($0,'');
$script = $name . $suffix;

die "Usage:\n perl $script file [verbose|debug]\n" if $#ARGV < 0 ;

# works on only ONE file or directory name

($debug) = grep /debug/,@ARGV;
if ($debug) {$debug = pop @ARGV};

($verbose) = grep /verbose/,@ARGV;
if ($verbose) {$verbose = pop @ARGV};

print ('\@ARGV :' . join (' ',@ARGV), "\n") if $debug;

$module = shift (@ARGV) || "empty";
if ($module eq "empty") {
    print "\n$script : Input Error : module name is empty\n";
    exit;
}

print "module input >$module<\n" if ($debug);

open(INP, "<$module");
@Tout=(<INP>);
close INP;

$count_here = 0;
$count_line = 0;
$count_enter = 0;
$count_exit = 0;
$count_return = 0;

$nam_fun = '';
$previous_line = '';

foreach $_ (@Tout) {

    $count_line = $count_line +1;

    if ($_ =~ /^function (\w+) /) {
	print "function_line :$_\n" if $verbose;
	$nam_fun = $1;
	print "function name >$nam_fun<\n" if $verbose;;

	$count_enter = 0;
	$count_exit = 0;
	$count_return = 0;
    }

    $message = "in $module around line $count_line in $nam_fun";

    if ($previous_line =~ /^function (\w+) /) {
	print "current_line of previous :$_\n" if $verbose;
	if ($_ =~ /^\s*\$here /) {
	    $count_here = 1;
	}
	else {
	    print "missing \$here = __FUNCTION__; " . $message . "\n"; 
	}
    }

    if ($_ =~ /^\s*entering_in_function /) {
	print "entering_line :$_\n" if $verbose;
	$count_enter = $count_enter + 1;
    }

    if ($_ =~ /^\s*exiting_from_function /) {
	print "exiting_line :$_\n" if $verbose;
	$count_exit = $count_exit + 1;
    }

    if (($_ =~ /^\s*throw /) ||
	($_ =~ /^\s*include /) || 
	($_ =~ /^\s*header /) || 
	($_ =~ /^\s*print_fatal_error /) ) {
	if ($count_exit != 0) {
	    $count_exit = 0;
	}
    }

    if ($_ =~ /^\s*return/) {
	print "return_line :$_\n" if $verbose;
	$count_return = $count_return + 1;

	if ($count_exit == 0) {
	    if ($count_enter != 0) {
		print "missing exiting " . $message . "\n"; 
	    }
	}
	else {
	    if ($count_enter == 0) {
		print "missing entering " . $message . "\n"; 
	    }
	}
	
	if ($count_enter > 1) {
	    print "too many ($count_enter) entering " . $message . "\n"; 
	}

	if ($count_exit > $count_return) {
	    print "too many ($count_exit) exiting " . $message . "\n"; 
	    print "not enough ($count_return) return " . $message . "\n"; 
	}
    } # return

    if ($_ =~ /^}/) {
	print "$_\n" if $verbose;

	if ($count_return == 0) {
	    print "ERROR missing return " . $message . "\n"; 
	}
    }

    $previous_line = $_;
    print "previous line $previous_line\n" if $verbose;

}


exit;
