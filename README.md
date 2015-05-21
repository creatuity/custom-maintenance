# custom-maintenance
Custom Maintenance Page

## Custom Maintenance Page Details
This feature allows you to customize maintenace page view. Thanks to this feature your page can have maintenance page that is fully responsive, configurable and easy to change!

## Configuration of counter 
1. There are two steps that you have to do:
  1. Check server date by typing date in terminal
  2. Having in mind server time, add in maintenance.flag file date or hour when you exptect that maintanace mode will be disabled
2. **maintenance.flag** possible date formats
  1. **Only time:**
    * H:i  -> 16:00
    * H.i.s -> 07.08.37
    * hh space? meridian -> 4 pm
    * HH MM II -> 070837 
  2. **Date and time:**
    * Y-m-d H:i:s -> 2015-01-10 04:25:48
    * Y-m-d H:i -> 2015/01/10 04:25
    * Y-m-d -> 2015/01/10 
    * d/m/Y H:i:s -> 2015/01/10 04:25:48
    * 10-Jan-15 15:52:01
    * mm "/" dd H:i -> 1/10 10:00
    * d-m-Y -> 10-1-2015
    * m -> March

## Configuration
1. Go to: **Admin->System->CREATUITY->Custom Maintenance**
2. You should see four areas:
 * Preview (there's a button that will generate preview of your maintenance page - this section is visible only on store view scope)
 * General (here you can pick logo anc color of maintanace page for each website/store/store view)
 * Contact on Maintanance Page (add you email address so that your client can easily reach use even if your site is temporarily unavailable)
 * Social Media (add links to your social media account, those links will be displayed in the footer)

## Preview
You can always preview how your maintanance page will look like for particular store by clicking on Preview button. Remember to save config at first! Preview button is visible only on store view level.
