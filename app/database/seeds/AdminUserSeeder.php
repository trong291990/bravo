<?php 
	class AdminUserSeeder extends Seeder {
		public function run() {
			$admin = AdminUser::create(array(
	            'email' => 'admin@admin.com',
	            'name' => 'Bravo Tour Admin',
	            'password' => '123456'
        	));
		}
	}
 ?>