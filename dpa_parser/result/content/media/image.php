<?php
// <media media-type="image">
//   <media-metadata name="media-id" value="urn-newsml-dpa-com-20090101-150824-99-07313:1440419295000"/>
//   <media-metadata name="image-fovea-region" value="142,183,576,483"/>
//   <media-reference alternate-text="Assistentin" height="60" mime-type="image/jpeg" name="thumbnail_4_3" source="../dpa-SportsLine-images/urn-newsml-dpa-com-20090101-150824-99-07313_thumbnail_4_3.jpg" width="80"/>
//   <media-reference alternate-text="Assistentin" height="300" mime-type="image/jpeg" name="medium_4_3" source="../dpa-SportsLine-images/urn-newsml-dpa-com-20090101-150824-99-07313_medium_4_3.jpg" width="400"/>
//   <media-reference alternate-text="Assistentin" height="113" mime-type="image/jpeg" name="small_16_9" source="../dpa-SportsLine-images/small/urn-newsml-dpa-com-20090101-150824-99-07313_small_16_9.jpg" width="200"/>
//   <media-reference alternate-text="Assistentin" height="133" mime-type="image/jpeg" name="small_3_2" source="../dpa-SportsLine-images/small/urn-newsml-dpa-com-20090101-150824-99-07313_small_3_2.jpg" width="200"/>
//   <media-reference alternate-text="Assistentin" height="200" mime-type="image/jpeg" name="small_1_1" source="../dpa-SportsLine-images/small/urn-newsml-dpa-com-20090101-150824-99-07313_small_1_1.jpg" width="200"/>
//   <media-reference alternate-text="Assistentin" height="150" mime-type="image/jpeg" name="small_4_3" source="../dpa-SportsLine-images/small/urn-newsml-dpa-com-20090101-150824-99-07313_small_4_3.jpg" width="200"/>
//   <media-reference alternate-text="Assistentin" height="200" mime-type="image/jpeg" name="small_3_4" source="../dpa-SportsLine-images/small/urn-newsml-dpa-com-20090101-150824-99-07313_small_3_4.jpg" width="150"/>
//   <media-reference alternate-text="Assistentin" height="600" mime-type="image/jpeg" name="large_4_3" source="../dpa-SportsLine-images/large/urn-newsml-dpa-com-20090101-150824-99-07313_large_4_3.jpg" width="800"/>
//   <media-caption>
//     <p>Steffi Jones wird Co-Trainerin der deutschen Frauenfußball-Nationalmannschft. Foto: Frank Rumpenhorst</p>
//   </media-caption>
//   <media-producer>
//     <person>Frank Rumpenhorst</person>
//   </media-producer>
// </media>

namespace DPAParser\Result\Content\Media;

class Image extends \DPAParser\Result\Content\Media {
  public function media_tag() {
    return sprintf('<img src="%s" width="%s" height="%s" alt="%s" />',
      $this->source(),
      $this->width(),
      $this->height(),
      $this->alt()
    );
  }
}
