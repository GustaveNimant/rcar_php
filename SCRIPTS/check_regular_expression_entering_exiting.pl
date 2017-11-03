#! /usr/bin/perl -w

my ($line_entering) = "....|.. entering  in function irp_build (home, index)" ;
my ($line_exiting)  = "....|.. exiting from function irp_build (home, index)" ;

print "line_entering >$line_entering<\n";

if ($line_entering =~ / entering  in function (\w+) / ) {
    
    print "FOUND 1 >{$1}< \n";
    
}

if ($line_entering =~ / entering  in function (\w+)\s*\((\w+),\s*(\w+)\)\s*$/ ) {
    print "FOUND 1 >{$1}< \n";
    print "FOUND 2 >{$2}< \n";
    print "FOUND 3 >{$3}< \n";
}

my (@list) = ($line_entering, $line_exiting);
    
print "list :\n" , (join ("\n", @list)), "\n";

($nam_fun) = ($line_entering =~ / entering  in function (.*)\s*$/);

print "nam_fun >$nam_fun<\n";

$regexp = quotemeta ($nam_fun);
print "regexp >$regexp<\n";

(@result) = grep (/$regexp/, @list);

print "result :\n" , (join ("\n", @result)), "\n";
exit;
