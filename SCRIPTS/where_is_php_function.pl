#!/usr/bin/perl -w
die "Usage:\n perl $0 <function_name> \n" if $#ARGV < 0 ;

$this_function = shift (@ARGV);

foreach $php_file (<*.php>){
	
	open(INP, "<$php_file");
	@tout_l=(<INP>);
	close INP;

#	print "\nphp_file is >$php_file<\n";
	$is_on = 0;

	@function_l = grep (/^function /, @tout_l);
	
	if (grep (/\b$this_function\b/, @function_l)) {
	
	    foreach $_ (@tout_l) {
    
		if ($_ =~ /^function $this_function \(/) {
		    $is_on = 1;
		    print "\nfunction $this_function\nis located in module\n$php_file\n\n";
		}

		if ( $is_on ) {	
		    print $_;
		}

		if ($_ =~ /^}\s*$/) {
		    $is_on = 0;	
		}

		if ($_ =~ /^};\s*$/) {
		    $is_on = 0;	
		}
	    }
	}
}

exit;
