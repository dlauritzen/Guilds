# Guilds

World of Warcraft Guild management and communication

## Introduction

I'm making this website as an experiment in using the WoW API, but also as a way to avoid the
annoyances of free guild management websites. At the moment it is targeted to a single specific
guild, but that will probably be changed in the future. As of now, you can change the targeted
guild and realm by changing the constants in `src/DLauritz/WoW/Utilities/Settings.php` to match
your needs.

Since the WoW Community API has no way to get Guild Calendar and Bank data, I expect to eventually
write an add-on to extract the data and an application to synchronize it with the server, but
those are lower priority at the moment.

## Links and Licensing

This website is a data-miner for the WoW Community API, whose documentation can be found at

     <http://blizzard.github.com/api-wow-docs/>

The website is built using the [Symfony](http://www.symfony.com) PHP Framework with Twitter's
[Bootstrap](http://twitter.github.com/bootstrap/) running the UI.

I don't feel any particular affection towards licensing this site, so feel free to take it and do
whatever. Just don't break any licenses set by Blizzard, Symfony, or Twitter.

## Contact

Feel free to contact me with questions or suggestions at

     <dallin@dallinlauritzen.com>