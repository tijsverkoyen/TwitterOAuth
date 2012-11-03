# Changelog since 2.1.1

* code styling
* no more converting to integer for the cursor (thx to Jamaica)

# Changelog since 2.1.0

* fixed issue with generation of basestring
* added a new method: http://dev.twitter.com/doc/post/:user/:list_id/create_all

# Changelog since 2.0.3

* made a lot of changes to reflect the current API, some of the methods aren't backwards compatible, so be carefull before upgrading

# Changelog since 2.0.2

* tested geo*
* implemented accountUpdateProfileImage
* implemented accountUpdateProfileBackgroundImage
* fixed issue with GET and POST (thx to Luiz Felipe)
* added a way to detect open_basedir (thx to Lee Kindness)

# Changelog since 2.0.1

* Fixed some documentation
* Added a new method: usersProfileImage
* Fixed trendsLocation
* Added new GEO-methods: geoSearch, geoSimilarPlaces, geoPlaceCreate (not tested because geo-services were disabled.)
* Added legalToS
* Added legalPrivacy
* Fixed helpTest

# Changelog since 2.0.0

* no more fatal if twitter is over capacity
* fix for calculating the header-string (thx to Dextro)
* fix for userListsIdStatuses (thx to Josh)