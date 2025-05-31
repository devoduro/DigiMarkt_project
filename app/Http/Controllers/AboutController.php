<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page.
     */
    public function index()
    {
        $team = [
            [
                'name' => 'John Doe',
                'position' => 'Digital Marketing Director',
                'image' => 'assets/images/team/team-1.jpg',
                'bio' => 'John has over 15 years of experience in digital marketing and leads our strategic initiatives.'
            ],
            [
                'name' => 'Jane Smith',
                'position' => 'Content Strategist',
                'image' => 'assets/images/team/team-2.jpg',
                'bio' => 'Jane specializes in content strategy and has helped numerous organizations improve their online presence.'
            ],
            [
                'name' => 'Michael Johnson',
                'position' => 'SEO Specialist',
                'image' => 'assets/images/team/team-3.jpg',
                'bio' => 'Michael is an expert in search engine optimization with a track record of improving search rankings.'
            ],
            [
                'name' => 'Sarah Williams',
                'position' => 'Social Media Manager',
                'image' => 'assets/images/team/team-4.jpg',
                'bio' => 'Sarah manages our social media strategies and has a passion for building online communities.'
            ],
        ];

        $milestones = [
            [
                'year' => '2018',
                'title' => 'Platform Launch',
                'description' => 'Initial launch of the Digital Marketing Platform'
            ],
            [
                'year' => '2019',
                'title' => 'Resource Expansion',
                'description' => 'Added 100+ new resources and expanded our document library'
            ],
            [
                'year' => '2020',
                'title' => 'Community Growth',
                'description' => 'Reached 10,000 registered users and implemented new features'
            ],
            [
                'year' => '2021',
                'title' => 'Platform Redesign',
                'description' => 'Complete redesign with improved user experience and mobile responsiveness'
            ],
            [
                'year' => '2022',
                'title' => 'Advanced Analytics',
                'description' => 'Introduced advanced analytics and personalized recommendations'
            ],
        ];

        return view('pages.about', compact('team', 'milestones'));
    }
}
