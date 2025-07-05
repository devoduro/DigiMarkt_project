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
    
    /**
     * Display the partners page.
     */
    public function partners()
    {
        $europeanPartners = [
            [
                'name' => 'Steinbeis Beratungszentren GmbH (SBZ)',
                'country' => 'Germany',
                'logo' => 'int@E_logo.png', // Using int@E_logo.png as a placeholder for SBZ
                'description' => 'Steinbeis Beratungszentren GmbH, headquartered in Leipzig, Germany, is a premier institute specializing in mediation, conflict management, and organizational development. The institute offers expert services in handling escalated conflict situations and citizen participation in infrastructure projects. As a leading training center in Germany, they provide comprehensive education programs in mediation and conflict management, emphasizing practical application and scientific foundation. Over the past two decades, Steinbeis Beratungszentren GmbH also gained expertise in project management by leading multiple cross-national EU grant-aided projects.',
                'website' => 'SBR'
            ],
            [
                'name' => 'Slovak University of Agriculture in Nitra (SUA)',
                'country' => 'Slovakia',
                'logo' => 'sua_logo.jpg',
                'description' => 'The Slovak University of Agriculture in Nitra has attained the position of one of Slovakia\'s leading universities since it was founded in 1952. The University is consistently rated in the top group for the high quality of its teaching and research in the Slovak Republic. The University cultivates close and productive links with its local and regional community and will continue to expand its work at an international level in both teaching and scientific research. The university provides education in the field of agriculture and related research areas such as: Agro biology, Food resources, Sustainable agriculture, Agricultural production, Biotechnology, Food technology, Engineering of agricultural machinery and equipment, and more.',
                'website' => 'SUA_Nitra'
            ],
            [
                'name' => 'Innovative Technologies and Education (Int@E UG)',
                'country' => 'Germany',
                'logo' => 'int@E_logo.png',
                'description' => 'Int@E UG is a German firm which provides vocational training, training innovative computer and medical technology, knowledge management, mobile learning, e-learning and software training, collaborative research and innovation, quality assessment, organizational analysis and organizational development to help education institutions of all kinds achieve greater excellence, navigate change, Knowledge transfer and strengthen the University-Enterprise linkage, and drive more powerful partnerships. Int@E UG experts have a long track record experience in supporting reform processes in the field of Higher Education in third countries including the participation in several EU Programs.',
                'website' => 'INT@E UG'
            ],
        ];
        
        $ghanaianPartners = [
            [
                'name' => 'Akenten Appiah-Menka University of Skills Training and Entrepreneurial Development (AAMUSTED)',
                'country' => 'Ghana',
                'logo' => 'aamusted.jpg',
                'description' => 'AAMUSTED is Ghana\'s Premier Public TVET and Entrepreneurial Development Teacher Education University. Our Mandate is to provide higher education in technical, vocational, and entrepreneurial training to develop skilled manpower for job creation and economic development, train and provide teachers with the relevant competence for teaching in technical and vocational education and training institutions, train and provide teachers with the relevant competence for teaching entrepreneurial development, and develop strong linkages between the University and industry or the community, to ensure the holistic training of teachers.',
                'mission' => 'To train and provide relevant TVET and entrepreneurial development teachers and other professionals for TVET institutions and industry and promote research and innovation for educational policy and economic development.',
                'vision' => 'To be a world-class socially responsible TVET and Entrepreneurial Development Teacher Education University.',
                'values' => ['Excellence with Integrity', 'Education for Work and Development', 'Creativity, Innovation and Invention', 'Collaboration and Teamwork', 'Entrepreneurial Development', 'Gender Equity, Social Inclusiveness and Diversity']
            ],
            [
                'name' => 'Bolgatanga Technical University (BTU)',
                'country' => 'Ghana',
                'logo' => 'Bolga_logo.png',
                'description' => 'Bolgatanga Technical University is committed to providing career-focused education and practical skills training.',
                'mission' => 'The mission of the university is to provide career-focused education, applying state-of-the-art laboratories and workshops for teaching, practical training, applied research, sustainable agricultural and entrepreneurship development in a conducive environment.',
                'vision' => 'The vision of the University is to become a preferred technical university with innovative academic programmes producing graduates equipped with new technological skills for sustainable development.',
                'values' => ['Academic freedom', 'Excellence', 'Integrity', 'Innovation', 'Discipline', 'Sustainability', 'Equity'],
                'niche' => 'The niche area of the University is ecological agriculture in line with its agrarian and savannah geographical location. The University will strive to ensure that the niche area guides its programmes and activities.'
            ],
            [
                'name' => 'Cape Coast Technical University (CCTU)',
                'country' => 'Ghana',
                'logo' => 'CCTU_logo.png',
                'description' => 'Cape Coast Technical University is dedicated to providing technical and vocational education to develop skilled professionals.',
                'mission' => 'Our mission is to provide quality technical, vocational and entrepreneurial, education that inspires learners to be creative and driven towards technology-based and sustainable solutions for communities and industries within the country and the sub-region.',
                'vision' => 'Our Vision is to be a leading technologically innovative and entrepreneurial Technical University with a reputation in green and clean energy technologies.',
                'values' => ['Innovation', 'Creativity', 'Professionalism', 'Integrity', 'Discipline', 'Respect for all', 'Team spirit', 'Service to community'],
                'functions' => ['Teaching, Research, and Innovation', 'Entrepreneurial Skills Development', 'Consultancy Services', 'Community Engagement']
            ],
        ];
        
        return view('pages.partners', compact('europeanPartners', 'ghanaianPartners'));
    }
}
