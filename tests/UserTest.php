<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    
    public function testMain(){
        // SIGNUP 
        $this->post('/api/users', [
                'id' => '100045154',
                'server' => '16',
                'username' => 'dragonjet',
                'game_id' => '1234',
                'game_name' => 'dragonjet',
                'email' => 'jetriconew@gmail.com',
                'password' => 'qwerty',
            ])
            ->seeJson(['success' => true])
            ->seeJson(['server' => 16])
            ->seeJson(['game_name' => 'dragonjet'])
            ->seeJson(['username' => 'dragonjet']);
        
        // FETCH SINGLE USER
        $this->get('/api/users/dragonjet', [])
            ->seeJson(['success' => true])
            ->seeJson(['server' => 16])
            ->seeJson(['game_name' => 'dragonjet'])
            ->seeJson(['username' => 'dragonjet']);
            
        // FETCH WRONG USERNAME
        $this->get('/api/users/dragonjet2', [])
            ->seeJson(['success' => false]);
        
        // UPDATE USER
        $this->post('/api/users/dragonjet', [
                'email' => 'test@example.com',
                'password' => 'asdf1234',
                'avatar' => 'http://graph.facebook.com/dragonjetmkii/picture',
            ])
            ->seeJson(['success' => true])
            ->seeJson(['avatar' => 'http://graph.facebook.com/dragonjetmkii/picture']);
            
        // UPDATE USER WRONG: INVALID EMAIL
        $this->post('/api/users/dragonjet', [
                'email' => 'test',
            ])
            ->seeJson(['success' => false]);
        
        // DELETE USER
        $this->delete('/api/users/dragonjet', [])
            ->seeJson(['success' => true]);
    }
}
