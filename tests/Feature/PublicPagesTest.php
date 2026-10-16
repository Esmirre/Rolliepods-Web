<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_home_page_is_reachable(): void
    {
        $this->get(route('home'))->assertOk();
    }

    public function test_about_page_is_reachable(): void
    {
        $this->get(route('about'))->assertOk();
    }

    public function test_news_page_is_reachable(): void
    {
        $this->get(route('news'))->assertOk();
    }

    public function test_login_page_is_reachable(): void
    {
        $this->get(route('login'))->assertOk();
    }

    public function test_register_page_is_reachable(): void
    {
        $this->get(route('register'))->assertOk();
    }
}
