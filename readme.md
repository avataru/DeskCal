DeskCal
=======

Inspired by Sherif Saleh's [May calendar](http://mondedesign.net/fond-decran-mai-2012/).

I loved the above calendar idea and decided I should make it work with any month
and year. It only uses CSS (no JavaScript or images) and Smarty to keep the
template out of the code. The original idea was to use it as a dynamic desktop
background but I have yet to find a way to do that on Windows 7.

The CSS was written through SASS to keep the ammount of code at minimum and to
be easy to modify later. However, not everything is using SASS variables at the
moment and some values are "hard-coded" so for example if the `$size` is modified,
the day number and label won't appear where they should.

Also, please keep in mind there might be bugs in the PHP code.


To do (maybe):
--------------

* Add navigation
* Add a favicon
* Improve the design (make it look better, like the original Sherif Saleh)
* Add a customization layer
* Refactor the CSS
* Integrate with Google Calendar to mark events

----------------------------------

License: [CC BY-NC-SA 3.0](http://creativecommons.org/licenses/by-nc-sa/3.0/)