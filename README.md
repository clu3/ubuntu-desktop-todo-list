## ubuntu-desktop-todo-list: Simple convenient todo list


### Description

Sometimes you want to see your toto list in your Descktop background image. This script will help you to embed your simple todo.txt file into the background


### Prerequisites

package: php-cli and php <a ref="http://php.net/manual/en/book.image.php">gd</a> extension

### Screenshot

<a href='http://www.clu3.com/wp-content/uploads/2011/08/active-1024x768.jpg'><img src="http://www.clu3.com/wp-content/uploads/2011/08/active-300x225.jpg" width=300></a>


### Configure

* Edit your todo list in todo.list. Each line is a task


* Configure preferred font in insert_text.php


* Configure insert_text.php : the background image $bgImage and the active image $activeBgImage that will be used


* Configure the background image path in change_bg.sh to be same as $activeBgImage in insert_text.php. 


### Run

* The following script will use insert_text.php to insert text in todo.txt list to the background image and use gconftool to activate that image as the background 


    `./change_bg.sh`


