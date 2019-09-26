<ul id="playlists" style="display:none;">
  <li data-source="playlist1" data-playlist-name="MY HTML PLAYLIST 1" data-thumbnail-path="content/thumbnails/large1.jpg">
    <p class="minimalDarkCategoriesTitle"><span class="minimialDarkBold">Title: </span>My HTML playlist 1</p>
    <p class="minimalDarkCategoriesType"><span class="minimialDarkBold">Type: </span>HTML</p>
    <p class="minimalDarkCategoriesDescription"><span class="minimialDarkBold">Description: </span>Created using html elements, videos are loaded and played from the server.</p>
  </li>
</ul>

<ul id="playlist1" style="display:none;">

    <li data-thumb-source="content/thumbnails/small-fwd.jpg" data-video-source="{{ $item->trailer_url }}" data-subtitle-soruce="[{source:'content/english_subtitle.txt', label:'English'}, {source:'content/romanian_subtitle.txt', label:'Romanian'},{source:'content/spanish_subtitle.txt', label:'Spanish'}]"  data-start-at-subtitle="2" data-downloadable="yes">	<div data-video-short-description="">
        <div>
          <p class="classicDarkThumbnailTitle">VIDEO TITLE</p>
          <p class="minimalDarkThumbnailDesc">Each video can contain a short description, the description can be formatted with CSS as you like.</p>
        </div>
      </div>
      <div data-video-long-description="">
        <div>
          <p class="minimalDarkVideoTitleDesc">VIDEO TITLE</p>
          <p class="minimalDarkVideoMainDesc">Each video can contain a detailed description, the description can be formatted with CSS as you like. The description window and description button can be disabled individually for each video or globally for all videos.</p>
          <p class="minimalDarkLink">For more information about this please follow <a href="http://www.webdesign-flash.ro/" target="_blank">this link</a></p>
        </div>
      </div>
    </li>

  </ul>
