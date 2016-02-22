<?php
use dflydev\markdown\MarkdownParser;
use \Suin\RSSWriter\Feed;
use \Suin\RSSWriter\Channel;
use \Suin\RssWriter\Item;


//General Blog Functions

function get_post_names()
{

    static $_cache = array();
    if (empty($_cache)) {

        //get the name of all the posts (newest first)

        $_cache = array_reverse(glob('posts/*.md'));
    }
    return $_cache;
}

//return an array of posts
function get_posts($page = 1, $perpage = 0)
{

    if ($perpage == 0) {
        $perpage = config('posts.perpage');
    }

    $posts = get_post_names();

    //Extract a specific page with results
    $posts = array_slice($posts, ($page - 1) * $perpage, $perpage);

    $tmp = array();

    //create a new instance of the markdown parser
    $md = new MarkdownParser();

    foreach ($posts as $k => $v) {

        $post = new stdClass();

        //Extract the data
        $arr = explode('_', $v);
        $post->date = strtotime(str_replace('posts/', '', $arr[0]));

        //the post URL
        $post->url = site_url() . date('Y/m', $post->date) . '/' . str_replace('.md', '', $arr[1]);

        //get the contents and convert it to HTML
        $content = $md->transformMarkdown(file_get_contents($v));

        //extract the title and body

        $arr = explode('</h1>', $content);
        $post->title = str_replace('<h1>', '', $arr[0]);
        $post->body = $arr[1];

        $tmp[] = $post;
    }


    return $tmp;
}

function find_post($year, $month, $name)
{

    foreach (get_post_names() as $index => $v) {
        if (strpos($v, "$year-$month") !== false && strpos($v, $name . '.md') !== false) {

            //Use the get_posts method to return a properly parsed object
            $arr = get_posts($index + 1, 1);
            return $arr[0];
        }
    }

    return false;
}

function has_pagination($page = 1)
{
    $total = count(get_post_names());

    return array(
        'prev' => $page > 1,
        'next' => $total > $page * config('posts.perpage')
    );
}

//The not found error
function not_found()
{
    error(404, render('404', null, false));
}

function generate_rss($posts)
{

    $feed = new Feed();
    $channel = new Channel();

    $channel->title(config('blog.title'));
    $channel->description(config('blog.description'));
    $channel->url(site_url());
    $channel->appendTo($feed);

    foreach ($posts as $p) {

        $item = new Item();
        $item->title($p->title);
        $item->description($p->url);
        $item->appendTo($channel);
    }
    echo $feed;
}

//turn an array of posts into a JSON

function generate_json($posts)
{
    return json_encode($posts);
}

