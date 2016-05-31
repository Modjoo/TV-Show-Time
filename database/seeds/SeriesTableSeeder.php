<?php

use Illuminate\Database\Seeder;

class SeriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('series')->delete();
        
        \DB::table('series')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Escape from Planet Earth',
                'synopsis' => 'Astronaut Scorch Supernova finds himself caug',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTQyMTk4NjkyMl5BMl5BanBnXkFtZTcwMzA2OTY4OA@@._V1_SX300.jpg',
                'actors' => 'Brendan Fraser, Rob Corddry, Ricky Gervais, J',
            'producer' => 'Bob Barlen, Cal Brunker, Tony Leech (story), ',
                'duration_pattern' => 89,
                'external_id' => 'tt0765446',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Breaking Bad',
                'synopsis' => 'A high school chemistry teacher diagnosed wit',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTQ0ODYzODc0OV5BMl5BanBnXkFtZTgwMDk3OTcyMDE@._V1_SX300.jpg',
                'actors' => 'Bryan Cranston, Anna Gunn, Aaron Paul, Dean N',
                'producer' => 'Vince Gilligan',
                'duration_pattern' => 49,
                'external_id' => 'tt0903747',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Game of Thrones',
                'synopsis' => 'While a civil war brews between several noble',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMjM5OTQ1MTY5Nl5BMl5BanBnXkFtZTgwMjM3NzMxODE@._V1_SX300.jpg',
                'actors' => 'Peter Dinklage, Lena Headey, Emilia Clarke, K',
                'producer' => 'David Benioff, D.B. Weiss',
                'duration_pattern' => 56,
                'external_id' => 'tt0944947',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'The Wire',
                'synopsis' => 'Baltimore drug scene, seen through the eyes o',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BNjc1NzYwODEyMV5BMl5BanBnXkFtZTcwNTcxMzU1MQ@@._V1_SX300.jpg',
                'actors' => 'Dominic West, John Doman, Deirdre Lovejoy, We',
                'producer' => 'David Simon',
                'duration_pattern' => 59,
                'external_id' => 'tt0306414',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Cosmos: A Spacetime Odyssey',
                'synopsis' => 'A documentary series that explores how we dis',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTc5NzgwNDE3N15BMl5BanBnXkFtZTgwNDAxMTY5MTE@._V1._CR51,41,938,1336_SY132_CR2,0,89,132_AL_.jpg_V1_SX300.jpg',
                'actors' => 'Neil deGrasse Tyson, Carl Sagan',
                'producer' => 'N/A',
                'duration_pattern' => 557,
                'external_id' => 'tt2395695',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Cosmos',
                'synopsis' => 'Astronomer Carl Sagan leads us on an engaging',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTI0NTg5MjA5OF5BMl5BanBnXkFtZTcwNDMxMTEyMQ@@._V1_SX300.jpg',
                'actors' => 'Carl Sagan',
                'producer' => 'N/A',
                'duration_pattern' => 60,
                'external_id' => 'tt0081846',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Rick and Morty',
                'synopsis' => 'An animated series that follows the exploits ',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTQxNDEwNTE0Nl5BMl5BanBnXkFtZTgwMzQ1MTg3MDE@._V1_SX300.jpg',
                'actors' => 'Justin Roiland, Chris Parnell, Spencer Gramme',
                'producer' => 'Dan Harmon, Justin Roiland',
                'duration_pattern' => 22,
                'external_id' => 'tt2861424',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'The Civil War',
                'synopsis' => 'A comprehensive survey of the American Civil ',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTc0NTY5MzAwOV5BMl5BanBnXkFtZTcwNTk3MzcyMQ@@._V1_SX300.jpg',
                'actors' => 'Sam Waterston, Julie Harris, Jason Robards, M',
                'producer' => 'N/A',
                'duration_pattern' => 680,
                'external_id' => 'tt0098769',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'The Sopranos',
                'synopsis' => 'New Jersey mob boss, Tony Soprano, deals with',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTIxMjc4NTA2Nl5BMl5BanBnXkFtZTYwNTU2MzU5._V1_SX300.jpg',
                'actors' => 'James Gandolfini, Lorraine Bracco, Edie Falco',
                'producer' => 'David Chase',
                'duration_pattern' => 55,
                'external_id' => 'tt0141842',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Young Sherlock Holmes',
                'synopsis' => 'When assorted people start having inexplicabl',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMjA0NjMyMTg4NV5BMl5BanBnXkFtZTcwMDIwNTAwMQ@@._V1_SX300.jpg',
                'actors' => 'Nicholas Rowe, Alan Cox, Sophie Ward, Anthony',
            'producer' => 'Arthur Conan Doyle (characters), Chris Columb',
                'duration_pattern' => 109,
                'external_id' => 'tt0090357',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'The World at War',
                'synopsis' => 'A series of documentaries about World War II.',
                'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTYyMzQ0NDk4OF5BMl5BanBnXkFtZTcwOTAwNjYyMQ@@._V1_SX300.jpg',
                'actors' => 'Laurence Olivier, Adolf Hitler',
                'producer' => 'N/A',
                'duration_pattern' => 52,
                'external_id' => 'tt0071075',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Life',
                'synopsis' => 'The story of wrongfully convicted men (Eddie ',
                    'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMjAwMTEwMDAwMl5BMl5BanBnXkFtZTcwODk4NDgyMQ@@._V1_SX300.jpg',
                    'actors' => 'Eddie Murphy, Martin Lawrence, Obba Babatundé',
                    'producer' => 'Robert Ramsey, Matthew Stone',
                    'duration_pattern' => 108,
                    'external_id' => 'tt0123964',
                ),
                12 => 
                array (
                    'id' => 13,
                    'title' => 'Avatar: The Last Airbender',
                    'synopsis' => 'In a war-torn world of elemental magic, a you',
                    'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTM3MTc3OTc0NF5BMl5BanBnXkFtZTcwOTQ0OTM1MQ@@._V1._CR34,0,295,440_SX89_AL_.jpg_V1_SX300.jpg',
                    'actors' => 'Zach Tyler, Dee Bradley Baker, Mae Whitman, J',
                    'producer' => 'Michael Dante DiMartino, Bryan Konietzko',
                    'duration_pattern' => 23,
                    'external_id' => 'tt0417299',
                ),
                13 => 
                array (
                    'id' => 14,
                    'title' => 'Last Week Tonight with John Oliver',
                    'synopsis' => 'Former Daily Show Correspondent John Oliver b',
                    'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BNDAwMDY0NjA2Ml5BMl5BanBnXkFtZTgwMTA1NTI3NzE@._V1_SX300.jpg',
                    'actors' => 'John Oliver, David Kaye',
                    'producer' => 'N/A',
                    'duration_pattern' => 30,
                    'external_id' => 'tt3530232',
                ),
                14 => 
                array (
                    'id' => 15,
                    'title' => 'True Detective',
                    'synopsis' => 'An anthology series in which police investiga',
                    'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTUzNTMwODI1OV5BMl5BanBnXkFtZTgwMDIzMTQ0NTE@._V1_SX300.jpg',
                    'actors' => 'Matthew McConaughey, Colin Farrell, Woody Har',
                    'producer' => 'Nic Pizzolatto',
                    'duration_pattern' => 55,
                    'external_id' => 'tt2356777',
                ),
                15 => 
                array (
                    'id' => 16,
                    'title' => 'Firefly',
                    'synopsis' => 'Five hundred years in the future, a renegade ',
                    'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTM0OTIzNjM4OV5BMl5BanBnXkFtZTcwNDk4MDU5MQ@@._V1._CR57,54,340,418_SY132_CR9,0,89,132_AL_.jpg_V1_SX300.jpg',
                    'actors' => 'Nathan Fillion, Gina Torres, Alan Tudyk, More',
                    'producer' => 'Joss Whedon',
                    'duration_pattern' => 44,
                    'external_id' => 'tt0303461',
                ),
                16 => 
                array (
                    'id' => 17,
                    'title' => 'Human Planet',
                    'synopsis' => 'Like all life forms, humanity partially adapt',
                    'cover_img_url' => 'http://ia.media-imdb.com/images/M/MV5BMTMyMDI0MDI3M15BMl5BanBnXkFtZTcwMTQ5NDQ3NA@@._V1_SX300.jpg',
                    'actors' => 'John Hurt',
                    'producer' => 'N/A',
                    'duration_pattern' => 50,
                    'external_id' => 'tt1806234',
                ),
                17 => 
                array (
                    'id' => 18,
                    'title' => 'Golden Earring: Live from The Twilight Zone',
                    'synopsis' => 'N/A',
                    'cover_img_url' => 'N/A',
                    'actors' => 'Rinus Gerritsen, Barry Hay, George Kooymans, ',
                    'producer' => 'N/A',
                    'duration_pattern' => 0,
                    'external_id' => 'tt1332710',
                ),
            ));
        
        
    }
}
