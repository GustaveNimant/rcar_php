#!/usr/bin/perl -w


foreach $php_file (<*.php>){

   %father_n_son_hash = father_n_son_hash_of_php_file ($php_file);

   print "\nhash\n";
   print_hash ('ici', 'father_n_son_hash', %father_n_son_hash);
   print "\n";
} 

sub father_n_son_hash_of_php_file 
{
    my ($php_file) = @_;
	
	open(INP, "<$php_file");
	@tout_l=(<INP>);
	close INP;

#	print "\nphp_file is >$php_file<\n";
	$is_on = 0;

	@function_l = grep (/^function /, @tout_l);
	
	if (grep (/\b$this_function\b/, @function_l)) {
	
	    foreach $_ (@tout_l) {
    
		if ($_ =~ /^function\s*(.*)_build\s*\(/) {
		    $father = $1;
		    print "father ${father}\n";
		}

		if ($_ =~ /= irp_provide \(\'(\w+)\',/) {
		    $son = $1;
		    $father_n_son_hash{$son} = $father;
		    print "\nson $son\n";
		}
		
	    }
	}
    return %father_n_son_hash;
}

sub print_hash 
{
   my($here, $name, %hash) = @_;
   my($key);

   if (keys(%hash) == 0 ) {
       print "print_hash: error no elements in Hash \"$name\"\n";
   }
   else {
       print "$here-d: Hash \"$name\":\n";   
       foreach $key (sort keys(%hash)) {
	   print "  '$hash{$key} -> $key';\n";
       }
   }

   print "\n";

} # end sub print_hash

exit;
