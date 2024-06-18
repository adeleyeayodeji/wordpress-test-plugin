<?php

/**
 * Test user functionality
 */
class TestUser extends WP_UnitTestCase
{
    private $user_id;

    /**
     * Set up the test environment, creating a user.
     */
    public function setUp(): void
    {
        parent::setUp();

        $user_data = [
            'role'         => 'administrator',
            'user_login'   => 'admin2',
            'user_pass'    => 'admin2',
            'user_email'   => 'admin@admin.com',
        ];

        //check if user exists
        $user = get_user_by('login', $user_data['user_login']);

        if ($user) {
            $this->user_id = $user->ID;
            //error log
            fwrite(STDOUT, "\n\033[32mUser already exists: " . $this->user_id . "\033[0m\n");
            return;
        }

        $user_id_or_error = wp_insert_user($user_data);

        if (is_wp_error($user_id_or_error)) {
            // Handle error, log it, or fail the test if necessary
            error_log($user_id_or_error->get_error_message());
            $this->fail('User creation failed: ' . $user_id_or_error->get_error_message());
        } else {
            $this->user_id = $user_id_or_error;
            //log
            fwrite(STDOUT, "\n\033[32mUser created: " . $this->user_id . "\033[0m\n");
        }
    }

    /**
     * Clean up the test environment after tests.
     */
    public function tearDown(): void
    {
        wp_delete_user($this->user_id);
        parent::tearDown();
    }

    /**
     * Test if the created user has the administrator role.
     */
    public function test_user_role(): void
    {
        $user = get_user_by('id', $this->user_id);
        if (!$user) {
            $this->fail('Failed to retrieve user by ID.');
        } else {
            $this->assertContains('administrator', $user->roles, 'User role is administrator.');
            // Output success message in green
            fwrite(STDOUT, "\n\033[32mSUCCESS: User role is administrator.\033[0m\n");
            //log the user
            error_log('UserTest: ' . print_r($user));
        }
    }

    /**
     * Test if the created user's email is valid.
     */
    public function test_user_email(): void
    {
        $user = get_user_by('id', $this->user_id);
        if (!$user) {
            $this->fail('Failed to retrieve user by ID.');
        } else {
            $this->assertEquals('admin@admin.com', $user->user_email, 'User email is valid.');
            // Output success message in green
            fwrite(STDOUT, "\n\033[32mSUCCESS: User email is valid.\033[0m\n");
        }
    }
}
