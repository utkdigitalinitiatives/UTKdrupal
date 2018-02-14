<?php
/**
 * @file footer.tpl.inc
 * Implementation to display the footer region.
 */
?>

<footer id="colophon" class="site-footer" role="contentinfo">
  <div id="siteinfo">
    <div id="meta-info">
      <p>
        <strong class="sitetile">
          <a href="https://www.lib.utk.edu">University Libraries
          </a>
        </strong>
        <br>
      </p>
    </div>
    <div id="meta-contact">
      <p>1015 Volunteer Boulevard
        <br />
        Knoxville, TN 37996-1000
        <br />
        Phone: (865) 974-4351
        <br />
        <a href="https://www.lib.utk.edu/contact">Contact Us
        </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="https://www.lib.utk.edu/contact/website-feedback">Website Feedback
        </a>
        <br />

        <!-- Social media icons -->
        <a href="https://www.facebook.com/utklibraries"><img src="/sites/all/themes/UTKdrupal/images/facebook-16.png" title="UT Libraries on Facebook" alt="UT Libraries on Facebook" width="16" height="16" /></a>
        <a href="https://foursquare.com/v/john-c-hodges-library/4b16792cf964a52077b923e3"><img src="/sites/all/themes/UTKdrupal/images/foursquare-16.png" title="UT Libraries on Foursquare" alt="UT Libraries on Foursquare" width="16" height="16" /></a>
        <a href="https://instagram.com/utklibraries/"><img src="/sites/all/themes/UTKdrupal/images/instagram-16.png" title="UT Libraries on Instagram" alt="UT Libraries on Instagram" width="16" height="16" /></a>
        <a href="https://pinterest.com/utklibraries"><img src="/sites/all/themes/UTKdrupal/images/pinterest-16.png" title="UT Libraries on Pinterest" alt="UT Libraries on Pinterest" width="16" height="16" /></a>
        <a href="https://twitter.com/utklibraries"><img src="/sites/all/themes/UTKdrupal/images/twitter-16.png" title="UT Libraries on Twitter" alt="UT Libraries on Twitter" width="16" height="16" /></a>
        <a href="https://www.youtube.com/user/utklibraries"><img src="/sites/all/themes/UTKdrupal/images/youtube-16.png" title="UT Libraries on YouTube" alt="UT Libraries on YouTube" width="16" height="16" /></a>
        <a href="https://itunes.apple.com/us/app/tennessee/id548076679?mt=8"><img src="/sites/all/themes/UTKdrupal/images/ut-16.png" title="University of Tennessee iOS App" alt="University of Tennessee iOS App" width="16" height="16" /></a>
      </p>
    </div>
  </div>
  <!-- #siteinfo -->
  <!-- Here Begins The Campus Footer. Do not touch below this line -->
  <div id="campus-footer">
    <div id="utk">
      <div id="bobi">
        <h2>
          <a href="http://www.utk.edu" class="logo icon-bobi-main">The University of Tennessee
          </a>
        </h2>
      </div>
      <div id="address">
        <p>
          <strong>The University of Tennessee, Knoxville
          </strong>
          <br>Knoxville, Tennessee 37996
          <br> 865-974-1000
        </p>
      </div>
    </div>
    <div id="toolkit">
      <form method="post" action="http://google.tennessee.edu/search">
        <div class="form-group">
          <input type="text" class="form-control" name="q"  maxlength="256" onfocus="if(this.value == 'Search utk.edu') { this.value = ''; }" value="Search utk.edu" title="Search UT Knoxville">
        </div>
        <input type="submit" name="btnG" class="btn btn-orange"  value="Go">
        <input type="hidden" name="output" value="xml_no_dtd">
        <input type="hidden" name="oe" value="UTF-8">
        <input type="hidden" name="ie" value="UTF-8">
        <input type="hidden" name="ud" value="1">
        <input type="hidden" name="site" value="Knoxville">
        <input type="hidden" name="client" value="utk_translate_frontend">
        <input type="hidden" name="entqr" value="3">
            <input type="hidden" name="sitesearch" value="utk.edu" />
        <input type="hidden" name="qtype" class="searchtext" value="utk" title="search type">
        <input type="hidden" name="proxystylesheet" value="utk_translate_frontend">
      </form>
      <br>
      <nav  role="navigation">
        <ul>
          <li>
            <a href="http://www.utk.edu/events/">Events
            </a>
          </li>
          <li>
            <a href="http://www.utk.edu/maps/">Map
            </a>
          </li>
        </ul>
        <ul>
          <li>
            <a href="http://www.utk.edu/alpha/">A-Z
            </a>
          </li>
          <li>
            <a href="http://directory.utk.edu">Directory
            </a>
          </li>
        </ul>
        <ul>
          <li>
            <a href="http://www.utk.edu/admissions/">Apply
            </a>
          </li>
          <li>
            <a href="http://giveto.utk.edu">Give to UT
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</footer>

<!-- The UT Footer ends here. -->
