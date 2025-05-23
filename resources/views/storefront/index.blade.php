@extends('layouts.shopfront')
@section('page-title')
    {{__('Home')}} - {{($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))}}
@endsection
@push('css-page')
@endpush
@push('script-page')

<style>
    html {
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}
body {
  margin: 0;
}
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
menu,
nav,
section,
summary {
  display: block;
}
audio,
canvas,
progress,
video {
  display: inline-block;
  vertical-align: baseline;
}
audio:not([controls]) {
  display: none;
  height: 0;
}
[hidden],
template {
  display: none;
}
a {
  background-color: transparent;
}
a:active,
a:hover {
  outline: 0;
}
abbr[title] {
  border-bottom: 1px dotted;
}
b,
strong {
  font-weight: 700;
}
dfn {
  font-style: italic;
}
h1 {
  font-size: 2em;
  margin: 0.67em 0;
}
mark {
  background: #ff0;
  color: #000;
}
small {
  font-size: 80%;
}
sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}
sup {
  top: -0.5em;
}
sub {
  bottom: -0.25em;
}
img {
  border: 0;
}
svg:not(:root) {
  overflow: hidden;
}
figure {
  margin: 1em 40px;
}
hr {
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  height: 0;
}
pre {
  overflow: auto;
}
code,
kbd,
pre,
samp {
  font-family: monospace, monospace;
  font-size: 1em;
}
button,
input,
optgroup,
select,
textarea {
  color: inherit;
  font: inherit;
  margin: 0;
}
button {
  overflow: visible;
}
button,
select {
  text-transform: none;
}
button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
  -webkit-appearance: button;
  cursor: pointer;
}
button[disabled],
html input[disabled] {
  cursor: default;
}
button::-moz-focus-inner,
input::-moz-focus-inner {
  border: 0;
  padding: 0;
}
input {
  line-height: normal;
}
input[type="checkbox"],
input[type="radio"] {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 0;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  height: auto;
}
input[type="search"] {
  -webkit-appearance: textfield;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
}
input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}
fieldset {
  border: 1px solid silver;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em;
}
legend {
  border: 0;
  padding: 0;
}
textarea {
  overflow: auto;
}
optgroup {
  font-weight: 700;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
}
td,
th {
  padding: 0;
}
.fill-container {
  height: 100%;
  width: 100%;
}
@font-face {
  font-family: nf-icon;
  src: url(https://assets.nflxext.com/ffe/siteui/fonts/nf-icon-v1-93.eot);
  src: url(https://assets.nflxext.com/ffe/siteui/fonts/nf-icon-v1-93.eot?#iefix)
      format("embedded-opentype"),
    url(https://assets.nflxext.com/ffe/siteui/fonts/nf-icon-v1-93.woff)
      format("woff"),
    url(https://assets.nflxext.com/ffe/siteui/fonts/nf-icon-v1-93.ttf)
      format("truetype"),
    url(https://assets.nflxext.com/ffe/siteui/fonts/nf-icon-v1-93.svg#nf-icon-v1-93)
      format("svg");
  font-weight: 400;
  font-style: normal;
}
[class*=" icon-"],
[class^="icon-"] {
  font-family: nf-icon;
  speak: none;
  font-style: normal;
  font-weight: 400;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
}
.icon-logoUpdate:before {
  content: "\e5d0";
}
.icon-close:before {
  content: "\e762";
}
.icon-search:before {
  content: "\e636";
}
.icon-circle-solid:before {
  content: "\e622";
}
.icon-star-25-percent:before {
  content: "\e637";
}
.icon-star-50-percent:before {
  content: "\e638";
}
.icon-star-75-percent:before {
  content: "\e639";
}
.icon-star:before {
  content: "\e640";
}
.icon-add:before {
  content: "\e641";
}
.icon-play:before {
  content: "\e646";
}
.icon-leftArrow:before {
  content: "\e659";
}
.icon-rightArrow:before {
  content: "\e658";
}
.icon-kids:before {
  content: "\e691";
}
.icon-tvuiAdd:before {
  content: "\e716";
}
.icon-TvRatings:before {
  content: "\e733";
}
.icon-Talent:before {
  content: "\e734";
}
.icon-Awards:before {
  content: "\e736";
}
.icon-BoxOffice:before {
  content: "\e737";
}
.icon-round-x:before {
  content: "\e747";
}
.icon-globe:before {
  content: "\e896";
}
.icon-warning:before {
  content: "\e620";
}
.icon-rightCaret:before {
  content: "\e867";
}
.icon-leftCaret:before {
  content: "\e868";
}
.icon-disc:before {
  content: "\e871";
}
.icon-spinner:before {
  content: "\e765";
}
.icon-plainCheck:before {
  content: "\e804";
}
.icon-plainX:before {
  content: "\e807";
}
.icon-facebook:before {
  content: "\e628";
}
.icon-error:before {
  content: "\e798";
}
.icon-valid:before {
  content: "\e804";
}
.icon-lock:before {
  content: "\e625";
}
.icon-info-inv:before {
  content: "\e748";
}
.icon-success-inv:before {
  content: "\e746";
}
.icon-warn-inv:before {
  content: "\e743";
}
.icon-visa:before {
  content: "\e901";
}
.icon-mastercard:before {
  content: "\e902";
}
.icon-discover:before {
  content: "\e903";
}
.icon-amex:before {
  content: "\e900";
}
.icon-paypal:before {
  content: "\e914";
}
.icon-nicam-AL:before {
  content: "\f000";
}
.icon-nicam-6:before {
  content: "\f001";
}
.icon-nicam-9:before {
  content: "\f004";
}
.icon-nicam-12:before {
  content: "\f002";
}
.icon-nicam-16:before {
  content: "\f003";
}
.icon-nicam-violence:before {
  content: "\f005";
}
.icon-nicam-fear-anxiety:before {
  content: "\f006";
}
.icon-nicam-profanity:before {
  content: "\f007";
}
.icon-nicam-discrimination:before {
  content: "\f008";
}
.icon-nicam-drug-or-alcohol:before {
  content: "\f009";
}
.icon-nicam-sex:before {
  content: "\f010";
}
.icon-androidPlayRing:before {
  content: "\e665";
}
.icon-akiraMyListAdd:before {
  content: "\e850";
}
.icon-akiraMyListRemove:before {
  content: "\e852";
}
.icon-akiraCaretDown:before {
  content: "\e854";
}
.icon-akiraCaretRight:before {
  content: "\e658";
}
.icon-akiraCaretLeft:before {
  content: "\e659";
}
.icon-button-play:before {
  content: "\e884";
}
.icon-button-play-reverse:before {
  content: "\e890";
}
.icon-button-mylist-add:before {
  content: "\e885";
}
.icon-button-mylist-add-reverse:before {
  content: "\e891";
}
.icon-button-mylist-added:before {
  content: "\e888";
}
.icon-button-mylist-added-reverse:before {
  content: "\e894";
}
.icon-button-share:before {
  content: "\e886";
}
.icon-button-share-reverse:before {
  content: "\e892";
}
.icon-button-episodes:before {
  content: "\e887";
}
.icon-button-episodes-reverse:before {
  content: "\e893";
}
.icon-button-spinner:before {
  content: "\e765";
}
.icon-button-spinner-reverse:before {
  content: "\e765";
}
.icon-button-minus:before {
  content: "\e889";
}
.icon-button-minus-reverse:before {
  content: "\e895";
}
.icon-button-audio-on:before {
  content: "\e88a";
}
.icon-button-audio-on-reverse:before {
  content: "\e88c";
}
.icon-button-audio-off:before {
  content: "\e88b";
}
.icon-button-audio-off-reverse:before {
  content: "\e88d";
}
.icon-button-replay:before {
  content: "\f095";
}
.icon-button-replay-reverse:before {
  content: "\f096";
}
.icon-button-notification:before {
  content: "\e663";
}
.icon-button-notification-reverse:before {
  content: "\e663";
}
.icon-thumb-down:before {
  content: "\e660";
}
.icon-thumb-up:before {
  content: "\e661";
}
.icon-thin-caret-left:before {
  content: "\e704";
}
.icon-thin-caret-right:before {
  content: "\e705";
}
.icon-long-arrow-left:before {
  content: "\e673";
}
.icon-long-arrow-right:before {
  content: "\e672";
}
.icon-short-arrow-right:before {
  content: "\e89B";
}
.icon-uniE5D0:before {
  content: "\E5D0";
}
.icon-uniE5D1:before {
  content: "\E5D1";
}
.icon-uniE600:before {
  content: "\E600";
}
.icon-uniE601:before {
  content: "\E601";
}
.icon-uniE602:before {
  content: "\E602";
}
.icon-uniE603:before {
  content: "\E603";
}
.icon-uniE604:before {
  content: "\E604";
}
.icon-uniE605:before {
  content: "\E605";
}
.icon-uniE606:before {
  content: "\E606";
}
.icon-uniE607:before {
  content: "\E607";
}
.icon-uniE608:before {
  content: "\E608";
}
.icon-uniE609:before {
  content: "\E609";
}
.icon-uniE610:before {
  content: "\E610";
}
.icon-uniE611:before {
  content: "\E611";
}
.icon-uniE612:before {
  content: "\E612";
}
.icon-uniE613:before {
  content: "\E613";
}
.icon-uniE614:before {
  content: "\E614";
}
.icon-uniE615:before {
  content: "\E615";
}
.icon-uniE616:before {
  content: "\E616";
}
.icon-uniE617:before {
  content: "\E617";
}
.icon-uniE618:before {
  content: "\E618";
}
.icon-uniE619:before {
  content: "\E619";
}
.icon-uniE620:before {
  content: "\E620";
}
.icon-uniE621:before {
  content: "\E621";
}
.icon-uniE622:before {
  content: "\E622";
}
.icon-uniE623:before {
  content: "\E623";
}
.icon-uniE624:before {
  content: "\E624";
}
.icon-uniE625:before {
  content: "\E625";
}
.icon-uniE626:before {
  content: "\E626";
}
.icon-uniE627:before {
  content: "\E627";
}
.icon-uniE628:before {
  content: "\E628";
}
.icon-uniE629:before {
  content: "\E629";
}
.icon-uniE630:before {
  content: "\E630";
}
.icon-uniE631:before {
  content: "\E631";
}
.icon-uniE632:before {
  content: "\E632";
}
.icon-uniE633:before {
  content: "\E633";
}
.icon-uniE634:before {
  content: "\E634";
}
.icon-uniE635:before {
  content: "\E635";
}
.icon-uniE636:before {
  content: "\E636";
}
.icon-uniE637:before {
  content: "\E637";
}
.icon-uniE638:before {
  content: "\E638";
}
.icon-uniE639:before {
  content: "\E639";
}
.icon-uniE640:before {
  content: "\E640";
}
.icon-uniE641:before {
  content: "\E641";
}
.icon-uniE642:before {
  content: "\E642";
}
.icon-uniE643:before {
  content: "\E643";
}
.icon-uniE644:before {
  content: "\E644";
}
.icon-uniE645:before {
  content: "\E645";
}
.icon-uniE646:before {
  content: "\E646";
}
.icon-uniE647:before {
  content: "\E647";
}
.icon-uniE648:before {
  content: "\E648";
}
.icon-uniE649:before {
  content: "\E649";
}
.icon-uniE650:before {
  content: "\E650";
}
.icon-uniE651:before {
  content: "\E651";
}
.icon-uniE652:before {
  content: "\E652";
}
.icon-uniE653:before {
  content: "\E653";
}
.icon-uniE654:before {
  content: "\E654";
}
.icon-uniE655:before {
  content: "\E655";
}
.icon-uniE656:before {
  content: "\E656";
}
.icon-uniE657:before {
  content: "\E657";
}
.icon-uniE658:before {
  content: "\E658";
}
.icon-uniE659:before {
  content: "\E659";
}
.icon-uniE660:before {
  content: "\E660";
}
.icon-uniE661:before {
  content: "\E661";
}
.icon-uniE662:before {
  content: "\E662";
}
.icon-uniE663:before {
  content: "\E663";
}
.icon-uniE664:before {
  content: "\E664";
}
.icon-uniE665:before {
  content: "\E665";
}
.icon-uniE666:before {
  content: "\E666";
}
.icon-uniE667:before {
  content: "\E667";
}
.icon-uniE668:before {
  content: "\E668";
}
.icon-uniE669:before {
  content: "\E669";
}
.icon-uniE670:before {
  content: "\E670";
}
.icon-uniE671:before {
  content: "\E671";
}
.icon-uniE672:before {
  content: "\E672";
}
.icon-uniE673:before {
  content: "\E673";
}
.icon-uniE674:before {
  content: "\E674";
}
.icon-uniE675:before {
  content: "\E675";
}
.icon-uniE676:before {
  content: "\E676";
}
.icon-uniE677:before {
  content: "\E677";
}
.icon-uniE678:before {
  content: "\E678";
}
.icon-uniE679:before {
  content: "\E679";
}
.icon-uniE680:before {
  content: "\E680";
}
.icon-uniE681:before {
  content: "\E681";
}
.icon-uniE682:before {
  content: "\E682";
}
.icon-uniE683:before {
  content: "\E683";
}
.icon-uniE684:before {
  content: "\E684";
}
.icon-uniE685:before {
  content: "\E685";
}
.icon-uniE687:before {
  content: "\E687";
}
.icon-uniE688:before {
  content: "\E688";
}
.icon-uniE689:before {
  content: "\E689";
}
.icon-uniE690:before {
  content: "\E690";
}
.icon-uniE691:before {
  content: "\E691";
}
.icon-uniE692:before {
  content: "\E692";
}
.icon-uniE693:before {
  content: "\E693";
}
.icon-uniE694:before {
  content: "\E694";
}
.icon-uniE695:before {
  content: "\E695";
}
.icon-uniE696:before {
  content: "\E696";
}
.icon-uniE697:before {
  content: "\E697";
}
.icon-uniE698:before {
  content: "\E698";
}
.icon-uniE699:before {
  content: "\E699";
}
.icon-uniE700:before {
  content: "\E700";
}
.icon-uniE701:before {
  content: "\E701";
}
.icon-uniE702:before {
  content: "\E702";
}
.icon-uniE703:before {
  content: "\E703";
}
.icon-uniE704:before {
  content: "\E704";
}
.icon-uniE705:before {
  content: "\E705";
}
.icon-uniE706:before {
  content: "\E706";
}
.icon-uniE707:before {
  content: "\E707";
}
.icon-uniE708:before {
  content: "\E708";
}
.icon-uniE709:before {
  content: "\E709";
}
.icon-uniE710:before {
  content: "\E710";
}
.icon-uniE711:before {
  content: "\E711";
}
.icon-uniE712:before {
  content: "\E712";
}
.icon-uniE713:before {
  content: "\E713";
}
.icon-uniE714:before {
  content: "\E714";
}
.icon-uniE715:before {
  content: "\E715";
}
.icon-uniE716:before {
  content: "\E716";
}
.icon-uniE718:before {
  content: "\E718";
}
.icon-uniE719:before {
  content: "\E719";
}
.icon-uniE720:before {
  content: "\E720";
}
.icon-uniE721:before {
  content: "\E721";
}
.icon-uniE722:before {
  content: "\E722";
}
.icon-uniE723:before {
  content: "\E723";
}
.icon-uniE724:before {
  content: "\E724";
}
.icon-uniE725:before {
  content: "\E725";
}
.icon-uniE726:before {
  content: "\E726";
}
.icon-uniE727:before {
  content: "\E727";
}
.icon-uniE728:before {
  content: "\E728";
}
.icon-uniE729:before {
  content: "\E729";
}
.icon-uniE730:before {
  content: "\E730";
}
.icon-uniE731:before {
  content: "\E731";
}
.icon-uniE732:before {
  content: "\E732";
}
.icon-uniE733:before {
  content: "\E733";
}
.icon-uniE734:before {
  content: "\E734";
}
.icon-uniE735:before {
  content: "\E735";
}
.icon-uniE736:before {
  content: "\E736";
}
.icon-uniE737:before {
  content: "\E737";
}
.icon-uniE738:before {
  content: "\E738";
}
.icon-uniE739:before {
  content: "\E739";
}
.icon-uniE740:before {
  content: "\E740";
}
.icon-uniE741:before {
  content: "\E741";
}
.icon-uniE742:before {
  content: "\E742";
}
.icon-uniE743:before {
  content: "\E743";
}
.icon-uniE744:before {
  content: "\E744";
}
.icon-uniE745:before {
  content: "\E745";
}
.icon-uniE746:before {
  content: "\E746";
}
.icon-uniE747:before {
  content: "\E747";
}
.icon-uniE748:before {
  content: "\E748";
}
.icon-uniE749:before {
  content: "\E749";
}
.icon-uniE750:before {
  content: "\E750";
}
.icon-uniE751:before {
  content: "\E751";
}
.icon-uniE752:before {
  content: "\E752";
}
.icon-uniE753:before {
  content: "\E753";
}
.icon-uniE754:before {
  content: "\E754";
}
.icon-uniE755:before {
  content: "\E755";
}
.icon-uniE756:before {
  content: "\E756";
}
.icon-uniE757:before {
  content: "\E757";
}
.icon-uniE758:before {
  content: "\E758";
}
.icon-uniE759:before {
  content: "\E759";
}
.icon-uniE760:before {
  content: "\E760";
}
.icon-uniE761:before {
  content: "\E761";
}
.icon-uniE762:before {
  content: "\E762";
}
.icon-uniE763:before {
  content: "\E763";
}
.icon-uniE764:before {
  content: "\E764";
}
.icon-uniE765:before {
  content: "\E765";
}
.icon-uniE766:before {
  content: "\E766";
}
.icon-uniE767:before {
  content: "\E767";
}
.icon-uniE775:before {
  content: "\E775";
}
.icon-uniE776:before {
  content: "\E776";
}
.icon-uniE777:before {
  content: "\E777";
}
.icon-uniE778:before {
  content: "\E778";
}
.icon-uniE779:before {
  content: "\E779";
}
.icon-uniE780:before {
  content: "\E780";
}
.icon-uniE781:before {
  content: "\E781";
}
.icon-uniE782:before {
  content: "\E782";
}
.icon-uniE783:before {
  content: "\E783";
}
.icon-uniE784:before {
  content: "\E784";
}
.icon-uniE785:before {
  content: "\E785";
}
.icon-uniE786:before {
  content: "\E786";
}
.icon-uniE787:before {
  content: "\E787";
}
.icon-uniE796:before {
  content: "\E796";
}
.icon-uniE797:before {
  content: "\E797";
}
.icon-uniE798:before {
  content: "\E798";
}
.icon-uniE799:before {
  content: "\E799";
}
.icon-uniE800:before {
  content: "\E800";
}
.icon-uniE801:before {
  content: "\E801";
}
.icon-uniE802:before {
  content: "\E802";
}
.icon-uniE803:before {
  content: "\E803";
}
.icon-uniE804:before {
  content: "\E804";
}
.icon-uniE805:before {
  content: "\E805";
}
.icon-uniE806:before {
  content: "\E806";
}
.icon-uniE807:before {
  content: "\E807";
}
.icon-uniE850:before {
  content: "\E850";
}
.icon-uniE851:before {
  content: "\E851";
}
.icon-uniE852:before {
  content: "\E852";
}
.icon-uniE853:before {
  content: "\E853";
}
.icon-uniE854:before {
  content: "\E854";
}
.icon-uniE855:before {
  content: "\E855";
}
.icon-uniE856:before {
  content: "\E856";
}
.icon-uniE857:before {
  content: "\E857";
}
.icon-uniE858:before {
  content: "\E858";
}
.icon-uniE859:before {
  content: "\E859";
}
.icon-uniE860:before {
  content: "\E860";
}
.icon-uniE861:before {
  content: "\E861";
}
.icon-uniE862:before {
  content: "\E862";
}
.icon-uniE863:before {
  content: "\E863";
}
.icon-uniE864:before {
  content: "\E864";
}
.icon-uniE865:before {
  content: "\E865";
}
.icon-uniE866:before {
  content: "\E866";
}
.icon-uniE867:before {
  content: "\E867";
}
.icon-uniE868:before {
  content: "\E868";
}
.icon-uniE869:before {
  content: "\E869";
}
.icon-uniE870:before {
  content: "\E870";
}
.icon-uniE871:before {
  content: "\E871";
}
.icon-uniE872:before {
  content: "\E872";
}
.icon-uniE873:before {
  content: "\E873";
}
.icon-uniE874:before {
  content: "\E874";
}
.icon-uniE875:before {
  content: "\E875";
}
.icon-uniE876:before {
  content: "\E876";
}
.icon-uniE877:before {
  content: "\E877";
}
.icon-uniE878:before {
  content: "\E878";
}
.icon-uniE879:before {
  content: "\E879";
}
.icon-uniE880:before {
  content: "\E880";
}
.icon-uniE881:before {
  content: "\E881";
}
.icon-uniE882:before {
  content: "\E882";
}
.icon-uniE883:before {
  content: "\E883";
}
.icon-uniE884:before {
  content: "\E884";
}
.icon-uniE885:before {
  content: "\E885";
}
.icon-uniE886:before {
  content: "\E886";
}
.icon-uniE887:before {
  content: "\E887";
}
.icon-uniE888:before {
  content: "\E888";
}
.icon-uniE889:before {
  content: "\E889";
}
.icon-uniE88A:before {
  content: "\E88A";
}
.icon-uniE88B:before {
  content: "\E88B";
}
.icon-uniE88C:before {
  content: "\E88C";
}
.icon-uniE88D:before {
  content: "\E88D";
}
.icon-uniE890:before {
  content: "\E890";
}
.icon-uniE891:before {
  content: "\E891";
}
.icon-uniE892:before {
  content: "\E892";
}
.icon-uniE893:before {
  content: "\E893";
}
.icon-uniE894:before {
  content: "\E894";
}
.icon-uniE895:before {
  content: "\E895";
}
.icon-uniE896:before {
  content: "\E896";
}
.icon-uniE897:before {
  content: "\E897";
}
.icon-uniE898:before {
  content: "\E898";
}
.icon-uniE89A:before {
  content: "\E89A";
}
.icon-uniE89B:before {
  content: "\E89B";
}
.icon-uniE89C:before {
  content: "\E89C";
}
.icon-uniE89D:before {
  content: "\E89D";
}
.icon-uniE8A1:before {
  content: "\E8A1";
}
.icon-uniE8A2:before {
  content: "\E8A2";
}
.icon-uniE8A3:before {
  content: "\E8A3";
}
.icon-uniE8A4:before {
  content: "\E8A4";
}
.icon-uniE8A5:before {
  content: "\E8A5";
}
.icon-uniE8A6:before {
  content: "\E8A6";
}
.icon-uniE8A7:before {
  content: "\E8A7";
}
.icon-uniE8A8:before {
  content: "\E8A8";
}
.icon-uniE900:before {
  content: "\E900";
}
.icon-uniE901:before {
  content: "\E901";
}
.icon-uniE902:before {
  content: "\E902";
}
.icon-uniE903:before {
  content: "\E903";
}
.icon-uniE904:before {
  content: "\E904";
}
.icon-uniE905:before {
  content: "\E905";
}
.icon-uniE906:before {
  content: "\E906";
}
.icon-uniE907:before {
  content: "\E907";
}
.icon-uniE908:before {
  content: "\E908";
}
.icon-uniE909:before {
  content: "\E909";
}
.icon-uniE910:before {
  content: "\E910";
}
.icon-uniE911:before {
  content: "\E911";
}
.icon-uniE912:before {
  content: "\E912";
}
.icon-uniE913:before {
  content: "\E913";
}
.icon-uniE914:before {
  content: "\E914";
}
.icon-uniE915:before {
  content: "\E915";
}
.icon-uniE916:before {
  content: "\E916";
}
.icon-uniE940:before {
  content: "\E940";
}
.icon-uniE941:before {
  content: "\E941";
}
.icon-uniE942:before {
  content: "\E942";
}
.icon-uniE943:before {
  content: "\E943";
}
.icon-uniF000:before {
  content: "\F000";
}
.icon-uniF001:before {
  content: "\F001";
}
.icon-uniF002:before {
  content: "\F002";
}
.icon-uniF003:before {
  content: "\F003";
}
.icon-uniF004:before {
  content: "\F004";
}
.icon-uniF005:before {
  content: "\F005";
}
.icon-uniF006:before {
  content: "\F006";
}
.icon-uniF007:before {
  content: "\F007";
}
.icon-uniF008:before {
  content: "\F008";
}
.icon-uniF009:before {
  content: "\F009";
}
.icon-uniF010:before {
  content: "\F010";
}
.icon-uniF011:before {
  content: "\F011";
}
.icon-uniF012:before {
  content: "\F012";
}
.icon-uniF013:before {
  content: "\F013";
}
.icon-uniF014:before {
  content: "\F014";
}
.icon-uniF015:before {
  content: "\F015";
}
.icon-uniF016:before {
  content: "\F016";
}
.icon-uniF017:before {
  content: "\F017";
}
.icon-uniF018:before {
  content: "\F018";
}
.icon-uniF019:before {
  content: "\F019";
}
.icon-uniF020:before {
  content: "\F020";
}
.icon-uniF021:before {
  content: "\F021";
}
.icon-uniF022:before {
  content: "\F022";
}
.icon-uniF023:before {
  content: "\F023";
}
.icon-uniF024:before {
  content: "\F024";
}
.icon-uniF025:before {
  content: "\F025";
}
.icon-uniF026:before {
  content: "\F026";
}
.icon-uniF027:before {
  content: "\F027";
}
.icon-uniF028:before {
  content: "\F028";
}
.icon-uniF029:before {
  content: "\F029";
}
.icon-uniF030:before {
  content: "\F030";
}
.icon-uniF031:before {
  content: "\F031";
}
.icon-uniF032:before {
  content: "\F032";
}
.icon-uniF033:before {
  content: "\F033";
}
.icon-uniF034:before {
  content: "\F034";
}
.icon-uniF035:before {
  content: "\F035";
}
.icon-uniF036:before {
  content: "\F036";
}
.icon-uniF037:before {
  content: "\F037";
}
.icon-uniF038:before {
  content: "\F038";
}
.icon-uniF039:before {
  content: "\F039";
}
.icon-uniF040:before {
  content: "\F040";
}
.icon-stacked-screens:before {
  content: "\F041";
}
.icon-stacked-screens-small:before {
  content: "\F099";
}
.icon-cross-device-screens:before {
  content: "\F042";
}
.icon-cross-device-screens-desktop:before {
  content: "\F098";
}
.icon-cross-device-screens-small:before {
  content: "\F097";
}
.icon-tv-screen:before {
  content: "\F043";
}
.icon-price-tag:before {
  content: "\F044";
}
.icon-cancel:before {
  content: "\F045";
}
.seBox {
  color: #f7f7f7;
  margin: 8.5em auto 0 auto;
  width: 45em;
}
.seHeader {
  font-weight: 700;
  font-size: 28px;
  margin-bottom: 2em;
}
.seNflxButton {
  border: 1px solid #b2b2b2;
  font-weight: 700;
  margin-top: 20px;
  min-width: 80px;
  display: inline-block;
  padding: 5px 10px;
  text-align: center;
}
.seHomeLink {
  text-decoration: none;
  color: #b2b2b2;
}
.nfButton {
  cursor: pointer;
  display: inline-block;
  height: 30px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  padding: 5px;
}
.nfButton.black {
  background-color: #000;
  color: #fff;
  border: 1px solid #111;
}
.sub-menu.theme-lakira {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  top: 71px;
  position: absolute;
  background-color: rgba(0, 0, 0, 0.9);
  color: #fff;
  font-size: 13px;
  line-height: 21px;
  border: solid 1px rgba(255, 255, 255, 0.15);
  cursor: default;
  opacity: 0;
}
.sub-menu.theme-lakira a,
.sub-menu.theme-lakira div,
.sub-menu.theme-lakira li,
.sub-menu.theme-lakira span,
.sub-menu.theme-lakira ul {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
@media screen and (max-width: 950px) {
  .sub-menu.theme-lakira {
    top: 64px;
  }
}
.sub-menu.theme-lakira.sub-menu-top {
  top: auto;
  bottom: 71px;
}
@media screen and (max-width: 950px) {
  .sub-menu.theme-lakira.sub-menu-top {
    top: auto;
    bottom: 64px;
  }
}
.sub-menu.theme-lakira .sub-menu-list-special {
  font-weight: 700;
  border-right: 1px solid #4d4d4d;
  margin-right: 5px;
}
.sub-menu.theme-lakira > .topbar {
  position: absolute;
  top: -2px;
  left: 0;
  right: 0;
  height: 2px;
  background: #e5e5e5;
}
.sub-menu.theme-lakira.sub-menu-top > .topbar {
  top: auto;
  bottom: -2px;
}
.sub-menu.theme-lakira .sub-menu-list,
.sub-menu.theme-lakira .sub-menu-list-special {
  height: auto;
  padding: 1.1rem;
  cursor: default;
}
.sub-menu.theme-lakira .sub-menu-list-special.multi-column,
.sub-menu.theme-lakira .sub-menu-list.multi-column {
  display: table-cell;
}
.sub-menu.theme-lakira .sub-menu-item,
.sub-menu.theme-lakira .sub-menu-item-special {
  cursor: default;
  line-height: 24px;
  display: block;
}
.sub-menu.theme-lakira .sub-menu-link {
  text-transform: none;
  display: inline-block;
  width: 100%;
  color: #fff;
}
.sub-menu.theme-lakira .sub-menu-link:hover {
  text-decoration: underline;
}
.nf-icon-button {
  display: inline-block;
  color: #fff;
  position: relative;
}
.nf-icon-button .nf-icon-button-icon {
  display: inline-block;
  font-size: 2vw;
  vertical-align: middle;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.25);
  -webkit-transition: -webkit-transform 150ms ease;
  transition: -webkit-transform 150ms ease;
  -o-transition: -o-transform 150ms ease;
  -moz-transition: transform 150ms ease, -moz-transform 150ms ease;
  transition: transform 150ms ease;
  transition: transform 150ms ease, -webkit-transform 150ms ease,
    -moz-transform 150ms ease, -o-transform 150ms ease;
}
.nf-icon-button .nf-icon-button-label {
  display: inline-block;
  font-size: 1.1vw;
  margin-left: 0.6vw;
  margin-right: 1.7vw;
  font-weight: 700;
  vertical-align: middle;
  white-space: nowrap;
}
.nf-icon-button:focus {
  outline: 0;
}
.nf-icon-button.hovered .nf-icon-button-icon,
.nf-icon-button:hover .nf-icon-button-icon {
  background-color: rgba(0, 0, 0, 0.8);
  -webkit-transform: scale(1.15, 1.15);
  -moz-transform: scale(1.15, 1.15);
  -ms-transform: scale(1.15, 1.15);
  -o-transform: scale(1.15, 1.15);
  transform: scale(1.15, 1.15);
}
.nf-icon-button.hovered .nf-icon-button-tooltip,
.nf-icon-button:hover .nf-icon-button-tooltip {
  display: block;
}
.nf-icon-button .nf-icon-button-tooltip {
  display: none;
  position: absolute;
  top: 100%;
  margin-top: 6px;
  left: 25%;
  background: #fff;
  text-transform: uppercase;
  color: #000;
  width: 8.5vw;
  margin-left: -4vw;
  font-size: 0.9vw;
  font-weight: 700;
  padding: 2px 0 2px;
  text-align: center;
}
.nf-icon-button .nf-icon-button-tooltip:before {
  border-color: transparent transparent #fff;
  border-style: solid;
  border-width: 0 3px 3px;
  content: "";
  height: 0;
  left: 50%;
  margin-left: -2px;
  margin-top: -3px;
  position: absolute;
  top: 0;
  width: 0;
}
@-webkit-keyframes buttonFlash {
  0% {
    background: rgba(0, 0, 0, 0.5);
  }
  12% {
    background: rgba(255, 255, 255, 0.7);
  }
  100% {
    background: rgba(0, 0, 0, 0.5);
  }
}
@-moz-keyframes buttonFlash {
  0% {
    background: rgba(0, 0, 0, 0.5);
  }
  12% {
    background: rgba(255, 255, 255, 0.7);
  }
  100% {
    background: rgba(0, 0, 0, 0.5);
  }
}
@-o-keyframes buttonFlash {
  0% {
    background: rgba(0, 0, 0, 0.5);
  }
  12% {
    background: rgba(255, 255, 255, 0.7);
  }
  100% {
    background: rgba(0, 0, 0, 0.5);
  }
}
@keyframes buttonFlash {
  0% {
    background: rgba(0, 0, 0, 0.5);
  }
  12% {
    background: rgba(255, 255, 255, 0.7);
  }
  100% {
    background: rgba(0, 0, 0, 0.5);
  }
}
.nf-svg-button-wrapper {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  color: #fff;
}
.nf-svg-button-wrapper .nf-svg-button {
  pointer-events: auto;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  width: 1.2em;
  height: 1.2em;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-transition: -webkit-transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
  transition: -webkit-transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
  -o-transition: -o-transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
  -moz-transition: transform 350ms cubic-bezier(0.86, 0, 0.07, 1),
    -moz-transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
  transition: transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
  transition: transform 350ms cubic-bezier(0.86, 0, 0.07, 1),
    -webkit-transform 350ms cubic-bezier(0.86, 0, 0.07, 1),
    -moz-transform 350ms cubic-bezier(0.86, 0, 0.07, 1),
    -o-transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
}
.nf-svg-button-wrapper .nf-svg-button:focus {
  outline: 0;
}
.nf-svg-button-wrapper .nf-svg-button:hover {
  -webkit-transform: scale(1.13);
  -moz-transform: scale(1.13);
  -ms-transform: scale(1.13);
  -o-transform: scale(1.13);
  transform: scale(1.13);
  -webkit-transition: -webkit-transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
  transition: -webkit-transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
  -o-transition: -o-transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
  -moz-transition: transform 350ms cubic-bezier(0.86, 0, 0.07, 1),
    -moz-transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
  transition: transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
  transition: transform 350ms cubic-bezier(0.86, 0, 0.07, 1),
    -webkit-transform 350ms cubic-bezier(0.86, 0, 0.07, 1),
    -moz-transform 350ms cubic-bezier(0.86, 0, 0.07, 1),
    -o-transform 350ms cubic-bezier(0.86, 0, 0.07, 1);
}
.nf-svg-button-wrapper .nf-svg-button svg {
  color: #fff;
  fill: #fff;
  width: 0.8em;
  height: 0.8em;
}
.nf-svg-button-wrapper .nf-svg-button.simpleround {
  border: 0.1em solid rgba(255, 255, 255, 0.5);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  padding: 0.3em;
  margin: 0.25em;
  background: rgba(0, 0, 0, 0.5);
}
.nf-svg-button-wrapper .nf-svg-button.simpleround.clicked {
  -webkit-animation-duration: 0.4s;
  -moz-animation-duration: 0.4s;
  -o-animation-duration: 0.4s;
  animation-duration: 0.4s;
  -webkit-animation-name: buttonFlash;
  -moz-animation-name: buttonFlash;
  -o-animation-name: buttonFlash;
  animation-name: buttonFlash;
  -webkit-animation-iteration-count: 1;
  -moz-animation-iteration-count: 1;
  -o-animation-iteration-count: 1;
  animation-iteration-count: 1;
  -webkit-animation-timing-function: linear;
  -moz-animation-timing-function: linear;
  -o-animation-timing-function: linear;
  animation-timing-function: linear;
}
.nf-svg-button-wrapper .nf-svg-button.simpleround:hover {
  border-color: #fff;
  background: rgba(0, 0, 0, 0.7);
}
.nf-svg-button-wrapper .nf-svg-button-label {
  display: inline-block;
  font-size: 1.1vw;
  margin-left: 0.6vw;
  margin-right: 1.7vw;
  font-weight: 700;
  text-transform: uppercase;
  vertical-align: middle;
  white-space: nowrap;
}
.nf-svg-button-wrapper:focus {
  outline: 0;
}
.nf-svg-button-wrapper.hovered .nf-svg-button-tooltip,
.nf-svg-button-wrapper:hover .nf-svg-button-tooltip {
  display: block;
}
.nf-svg-button-wrapper .nf-svg-button-tooltip {
  display: none;
  position: absolute;
  top: 100%;
  margin-top: 6px;
  left: 50%;
  background: #fff;
  text-transform: uppercase;
  color: #000;
  width: 8.5vw;
  font-size: 0.9vw;
  font-weight: 700;
  padding: 2px 0 2px;
  text-align: center;
  -webkit-transform: translateX(-50%);
  -moz-transform: translateX(-50%);
  -ms-transform: translateX(-50%);
  -o-transform: translateX(-50%);
  transform: translateX(-50%);
}
.nf-svg-button-wrapper .nf-svg-button-tooltip:before {
  border-color: transparent transparent #fff;
  border-style: solid;
  border-width: 0 3px 3px;
  content: "";
  height: 0;
  left: 50%;
  margin-left: -2px;
  margin-top: -3px;
  position: absolute;
  top: 0;
  width: 0;
}
.akira-button {
  outline: 0;
  padding: 0.5em 1em;
  margin: 0;
  display: inline-block;
  border: none;
  background-color: #333;
  color: #fff;
  font-weight: 700;
}
.akira-button:hover {
  background-color: #4d4d4d;
}
.akira-button:active {
  background-color: #4d4d4d;
}
.akira-button:disabled {
  color: #333;
  background-color: #333;
}
.akira-button.akira-button-red {
  background-color: #b9090b;
  color: #fff;
}
.akira-button.akira-button-red:hover {
  background-color: #c20002;
}
.akira-button.akira-button-red:active {
  background-color: #c20002;
}
.akira-button.akira-button-red:disabled {
  color: #4d4d4d;
  background-color: rgba(185, 9, 11, 0.3);
}
.billboard-row {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -ms-touch-action: pan-y;
  touch-action: pan-y;
  margin-bottom: 20px;
  background-color: #000;
  position: relative;
  padding-bottom: 40%;
}
.billboard-row .info-box-play-container {
  height: 3.5vw;
  margin-bottom: 3vw;
}
.billboard-row .info-box-play-container .info-box-play {
  font-size: 3.5vw;
  height: 3.85vw;
  width: 3.85vw;
  margin-left: -1.8375vw;
  margin-top: -1.8375vw;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #fff;
  opacity: 1;
  position: absolute;
  z-index: 100;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: 0;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
  top: 15%;
}
.billboard-row .info-box-play-container .info-box-play:focus,
.billboard-row .info-box-play-container .info-box-play:hover {
  text-decoration: none;
  opacity: 1;
  -webkit-transform: scale(1.08, 1.08);
  -moz-transform: scale(1.08, 1.08);
  -ms-transform: scale(1.08, 1.08);
  -o-transform: scale(1.08, 1.08);
  transform: scale(1.08, 1.08);
}
.billboard-row .info-box-play-container .info-box-play:focus .playRing,
.billboard-row .info-box-play-container .info-box-play:hover .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.billboard-row .info-box-play-container .info-box-play:focus .play,
.billboard-row .info-box-play-container .info-box-play:hover .play {
  color: #e50914;
}
.billboard-row .info-box-play-container .info-box-play .annotation {
  text-align: center;
  position: absolute;
  width: 200%;
  font-size: 18%;
  left: -50%;
  white-space: nowrap;
  bottom: -0.98vw;
  font-weight: 700;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
}
.billboard-row .info-box-play-container .info-box-play .playRing {
  height: 3.5vw;
  width: 3.5vw;
  border: 0.175vw solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
}
.billboard-row .info-box-play-container .info-box-play .playRing:after {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  content: "";
  position: absolute;
  z-index: -1;
  left: 0;
  height: 100%;
  width: 100%;
}
.billboard-row .info-box-play-container .info-box-play .play {
  line-height: 3.5vw;
  width: 100%;
  color: #fff;
  font-size: 46%;
  left: 6%; /*!rtl:ignore*/
  text-align: center;
  position: absolute;
}
.billboard-row .info-box-play-container .info-box-play .play {
  color: #e50914;
}
.billboard-row .billboard-play {
  font-size: 7.2vw;
  height: 7.92vw;
  width: 7.92vw;
  margin-left: -3.78vw;
  margin-top: -3.78vw;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #fff;
  opacity: 0.3;
  z-index: 100;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: 0;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
  z-index: 1;
  position: absolute;
  top: 50%;
  right: 26%;
  left: auto;
}
.billboard-row .billboard-play:focus,
.billboard-row .billboard-play:hover {
  text-decoration: none;
  opacity: 1;
  -webkit-transform: scale(1.08, 1.08);
  -moz-transform: scale(1.08, 1.08);
  -ms-transform: scale(1.08, 1.08);
  -o-transform: scale(1.08, 1.08);
  transform: scale(1.08, 1.08);
}
.billboard-row .billboard-play:focus .playRing,
.billboard-row .billboard-play:hover .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.billboard-row .billboard-play:focus .play,
.billboard-row .billboard-play:hover .play {
  color: #e50914;
}
.billboard-row .billboard-play .annotation {
  text-align: center;
  position: absolute;
  width: 200%;
  font-size: 18%;
  left: -50%;
  white-space: nowrap;
  bottom: -2.016vw;
  font-weight: 700;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
}
.billboard-row .billboard-play .playRing {
  height: 7.2vw;
  width: 7.2vw;
  border: 0.36vw solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
}
.billboard-row .billboard-play .playRing:after {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  content: "";
  position: absolute;
  z-index: -1;
  left: 0;
  height: 100%;
  width: 100%;
}
.billboard-row .billboard-play .play {
  line-height: 7.2vw;
  width: 100%;
  color: #fff;
  font-size: 46%;
  left: 6%; /*!rtl:ignore*/
  text-align: center;
  position: absolute;
}
.billboard-row .billboard-play.info-box-play {
  position: static;
}
.billboard-row:hover .billboard-play {
  opacity: 0.3;
}
.billboard-row:hover .billboard-play:hover {
  opacity: 1;
}
.billboard-row .nav-layer {
  z-index: 3;
}
.billboard-row .nav-arrow {
  position: absolute;
  top: 50%;
  margin-top: -40px;
  font-size: 2.5vw;
  text-align: center;
  padding: 30px 20px;
  color: #fff;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  cursor: pointer;
  -webkit-transition: all 0.1s ease-out;
  -o-transition: all 0.1s ease-out;
  -moz-transition: all 0.1s ease-out;
  transition: all 0.1s ease-out;
}
.billboard-row .nav-arrow:focus,
.billboard-row .nav-arrow:hover {
  outline: 0;
  font-weight: 700;
  -webkit-transform: scale(1.25);
  -moz-transform: scale(1.25);
  -ms-transform: scale(1.25);
  -o-transform: scale(1.25);
  transform: scale(1.25);
}
.billboard-row .nav-arrow.nav-arrow-prev {
  -webkit-transform-origin: 55% 50%;
  -moz-transform-origin: 55% 50%;
  -ms-transform-origin: 55% 50%;
  -o-transform-origin: 55% 50%;
  transform-origin: 55% 50%;
  left: 0;
}
.billboard-row .nav-arrow.nav-arrow-next {
  -webkit-transform-origin: 45% 50%;
  -moz-transform-origin: 45% 50%;
  -ms-transform-origin: 45% 50%;
  -o-transform-origin: 45% 50%;
  transform-origin: 45% 50%;
  right: 0;
}
.billboard-row .nav-dots {
  position: absolute;
  bottom: 1vw;
  width: 400px;
  margin-left: -200px;
  left: 50%;
  text-align: center;
}
.billboard-row .nav-dots .nav-dot {
  display: inline-block;
  padding: 0.5vw 0.35vw;
  color: #fff;
  opacity: 0.5;
  font-size: 0.8vw;
  cursor: pointer;
}
.billboard-row .nav-dots .nav-dot.dot-active {
  opacity: 1;
  cursor: default;
}
.billboard-row .nav-info-gradient {
  position: absolute;
  bottom: 0;
  height: 50%;
  width: 75%;
  right: 0;
  z-index: 2;
  background-color: rgba(0, 0, 0, 0) 40%;
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    color-stop(40%, rgba(0, 0, 0, 0)),
    to(rgba(0, 0, 0, 0.5))
  );
  background-image: -webkit-linear-gradient(
    top,
    rgba(0, 0, 0, 0) 40%,
    rgba(0, 0, 0, 0.5) 100%
  );
  background-image: -moz-linear-gradient(
    top,
    rgba(0, 0, 0, 0) 40%,
    rgba(0, 0, 0, 0.5) 100%
  );
  background-image: -o-linear-gradient(
    top,
    rgba(0, 0, 0, 0) 40%,
    rgba(0, 0, 0, 0.5) 100%
  );
  background-image: linear-gradient(
    to bottom,
    rgba(0, 0, 0, 0) 40%,
    rgba(0, 0, 0, 0.5) 100%
  );
}
.billboard-row .billboard {
  position: absolute;
  z-index: 1;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: #000;
}
.billboard-row .billboard .billboard-pane {
  position: absolute;
  z-index: 3;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}
.billboard-row .billboard .billboard-play-hitzone {
  right: 0;
  top: 0;
  bottom: 0;
  position: absolute;
  width: 60%;
}
.billboard-row .billboard .billboard-pane-episodes {
  padding: 80px 0 60px 60px;
}
.billboard-row .billboard .billboard-pane-episodes .title {
  font-size: 32px;
  min-height: 39px;
  font-weight: 600;
  margin-bottom: 20px;
}
.billboard-row .billboard .billboard-pane-episodes .close-button {
  position: absolute;
  top: 124px;
  right: 33px;
  padding: 20px;
  font-size: 20px;
  cursor: pointer;
  z-index: 12;
}
.billboard-row .billboard .billboard-pane-episodes .nfDropDown.theme-lakira {
  z-index: 2;
  margin-bottom: 12px;
}
.billboard-row .billboard .billboard-pane-episodes .slider {
  padding: 0 20px 0 0;
}
.billboard-row .billboard .billboard-pane-episodes .slider .handle.handlePrev {
  left: -60px;
}
.billboard-row .billboard .billboard-pane-episodes .sliderMask {
  overflow: hidden;
}
.billboard-row .billboard .hero {
  position: absolute;
  height: 100%;
  right: 0;
  top: 0;
  z-index: 1;
  -webkit-transition: opacity 750ms;
  -o-transition: opacity 750ms;
  -moz-transition: opacity 750ms;
  transition: opacity 750ms;
}
.billboard-row .billboard .hero.hero-faded {
  opacity: 0.25;
}
.billboard-row .billboard .hero.cr0 {
  right: -20%;
  width: 20%;
}
.billboard-row .billboard .hero.cr1 {
  right: -40%;
  width: 20%;
}
.billboard-row .billboard .hero.cr2 {
  right: -60%;
  width: 20%;
}
.billboard-row .billboard .hero-vignette {
  background-image: -webkit-gradient(
    linear,
    left top,
    right top,
    color-stop(0, #000),
    color-stop(50%, transparent),
    to(transparent)
  );
  background-image: -webkit-linear-gradient(
    left,
    #000 0,
    transparent 50%,
    transparent 100%
  );
  background-image: -moz-linear-gradient(
    left,
    #000 0,
    transparent 50%,
    transparent 100%
  );
  background-image: -o-linear-gradient(
    left,
    #000 0,
    transparent 50%,
    transparent 100%
  );
  background-image: linear-gradient(
    to right,
    #000 0,
    transparent 50%,
    transparent 100%
  );
  width: 72%;
  height: 100%;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 2;
}
.billboard-row .billboard .hero-vignette-top {
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#141414),
    to(rgba(20, 20, 20, 0))
  );
  background-image: -webkit-linear-gradient(
    top,
    #141414 0,
    rgba(20, 20, 20, 0) 100%
  );
  background-image: -moz-linear-gradient(
    top,
    #141414 0,
    rgba(20, 20, 20, 0) 100%
  );
  background-image: -o-linear-gradient(
    top,
    #141414 0,
    rgba(20, 20, 20, 0) 100%
  );
  background-image: linear-gradient(
    to bottom,
    #141414 0,
    rgba(20, 20, 20, 0) 100%
  );
  -moz-background-size: 100% 100%;
  background-size: 100% 100%;
  background-position: 0 top;
  background-repeat: repeat-x;
  background-color: transparent;
  width: 100%;
  height: 12.8vw;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  opacity: 0.65;
}
.billboard-row .billboard.full-bleed-billboard .hero-vignette {
  left: 0;
  right: auto;
}
.billboard-row .billboard .info {
  position: absolute;
  left: 4%;
  top: 26%;
  width: 35%;
  z-index: 3;
}
@media screen and (min-width: 1500px) {
  .billboard-row .billboard .info {
    left: 60px;
  }
}
.billboard-row .billboard .info .title-card {
  width: 60%;
}
.billboard-row .billboard .info .title-logo,
.billboard-row .billboard .info .title-treatment {
  width: 90%;
}
.billboard-row .billboard .info .synopsis {
  color: #999;
  font-weight: 400;
  line-height: normal;
  width: 100%;
  font-size: 1.4vw;
}
.billboard-row .billboard .info .billboard-links {
  margin-top: 1.5vw;
  white-space: nowrap;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.billboard-row .billboard .info .meta {
  color: #666;
  margin: 15px 0 10px 0;
  width: 100%;
  font-size: 1.2vw;
  font-weight: 700;
}
.billboard-row .billboard .info .meta > span {
  margin-right: 10px;
}
.billboard-row .billboard .info .meta .match-score,
.billboard-row .billboard .info .meta .rating-wrapper,
.billboard-row .billboard .info .meta .starbar,
.billboard-row .billboard .info .meta .thumb-container {
  display: none;
}
.billboard-row .billboard .info .supplemental-message {
  font-size: 1.6vw;
  color: #e5e5e5;
}
.billboard-row .billboard .info .supplemental-message.recentlyAdded {
  font-size: 2.5vw;
  width: 100%;
  margin-top: 0;
  font-weight: 400;
  margin-bottom: 2px;
}
.billboard-row .billboard .info .supplemental-message.recentlyAdded b {
  font-size: 6vw;
  line-height: 6vw;
  font-weight: 700;
}
.nf-button {
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  text-decoration: none;
  cursor: pointer;
  font-family: arial, helvetica, sans-serif;
  font-weight: 700;
  outline: 0;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
  -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
  padding: 4px 7px;
  margin: 0;
  display: inline-block;
}
.nf-button:hover {
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3),
    0 2px 1px rgba(1, 1, 1, 0.3);
  -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3),
    0 2px 1px rgba(1, 1, 1, 0.3);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3),
    0 2px 1px rgba(1, 1, 1, 0.3);
  text-decoration: none;
}
.nf-button:active {
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
  -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
  text-decoration: none;
}
.nf-button .icon {
  margin-right: 7px;
  display: inline-block;
  vertical-align: middle;
}
.nf-button-white {
  background-color: #fff;
}
.nf-button-white:hover {
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#fff),
    to(#ddd)
  );
  background: -webkit-linear-gradient(#fff, #ddd);
  background: -moz-linear-gradient(#fff, #ddd);
  background: -o-linear-gradient(#fff, #ddd);
  background: linear-gradient(#fff, #ddd);
}
.nf-button-white:active {
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#cbcbcb),
    to(#b3b3b3)
  );
  background: -webkit-linear-gradient(#cbcbcb, #b3b3b3);
  background: -moz-linear-gradient(#cbcbcb, #b3b3b3);
  background: -o-linear-gradient(#cbcbcb, #b3b3b3);
  background: linear-gradient(#cbcbcb, #b3b3b3);
}
.nf-button-silver {
  background-color: #e5e5e5;
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#e5e5e5),
    to(#cbcbcb)
  );
  background-image: -webkit-linear-gradient(top, #e5e5e5, #cbcbcb);
  background-image: -moz-linear-gradient(top, #e5e5e5, #cbcbcb);
  background-image: -o-linear-gradient(top, #e5e5e5, #cbcbcb);
  background-image: linear-gradient(to bottom, #e5e5e5, #cbcbcb);
  border: 1px solid #b3b3b3;
}
.nf-button-silver:hover {
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#fff),
    to(#e5e5e5)
  );
  background: -webkit-linear-gradient(#fff, #e5e5e5);
  background: -moz-linear-gradient(#fff, #e5e5e5);
  background: -o-linear-gradient(#fff, #e5e5e5);
  background: linear-gradient(#fff, #e5e5e5);
}
.nf-button-silver:active {
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#cbcbcb),
    to(#b3b3b3)
  );
  background: -webkit-linear-gradient(#cbcbcb, #b3b3b3);
  background: -moz-linear-gradient(#cbcbcb, #b3b3b3);
  background: -o-linear-gradient(#cbcbcb, #b3b3b3);
  background: linear-gradient(#cbcbcb, #b3b3b3);
}
.nf-button-red {
  color: #fff;
  background-color: #d30b03;
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#d30b03),
    to(#a50709)
  );
  background-image: -webkit-linear-gradient(top, #d30b03, #a50709);
  background-image: -moz-linear-gradient(top, #d30b03, #a50709);
  background-image: -o-linear-gradient(top, #d30b03, #a50709);
  background-image: linear-gradient(to bottom, #d30b03, #a50709);
  border: 1px solid #810507;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
  -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
}
.nf-button-red:hover {
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#ed0b0f),
    to(#930709)
  );
  background: -webkit-linear-gradient(#ed0b0f, #930709);
  background: -moz-linear-gradient(#ed0b0f, #930709);
  background: -o-linear-gradient(#ed0b0f, #930709);
  background: linear-gradient(#ed0b0f, #930709);
}
.nf-button-red:active {
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#9c0b0e),
    to(#850708)
  );
  background: -webkit-linear-gradient(#9c0b0e, #850708);
  background: -moz-linear-gradient(#9c0b0e, #850708);
  background: -o-linear-gradient(#9c0b0e, #850708);
  background: linear-gradient(#9c0b0e, #850708);
}
.nf-button-blue {
  color: #fff;
  background-color: #1771d9;
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#1771d9),
    to(#1359ab)
  );
  background-image: -webkit-linear-gradient(top, #1771d9, #1359ab);
  background-image: -moz-linear-gradient(top, #1771d9, #1359ab);
  background-image: -o-linear-gradient(top, #1771d9, #1359ab);
  background-image: linear-gradient(to bottom, #1771d9, #1359ab);
  border: 1px solid #0f4585;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
  -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3);
}
.nf-button-blue:hover {
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#1b7ff1),
    to(#114f99)
  );
  background: -webkit-linear-gradient(#1b7ff1, #114f99);
  background: -moz-linear-gradient(#1b7ff1, #114f99);
  background: -o-linear-gradient(#1b7ff1, #114f99);
  background: linear-gradient(#1b7ff1, #114f99);
}
.nf-button-blue:active {
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#114f99),
    to(#0d3b73)
  );
  background: -webkit-linear-gradient(#114f99, #0d3b73);
  background: -moz-linear-gradient(#114f99, #0d3b73);
  background: -o-linear-gradient(#114f99, #0d3b73);
  background: linear-gradient(#114f99, #0d3b73);
}
.nf-button-dark {
  color: #fff;
  background-color: #646464;
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#646464),
    to(#191919)
  );
  background-image: -webkit-linear-gradient(top, #646464, #191919);
  background-image: -moz-linear-gradient(top, #646464, #191919);
  background-image: -o-linear-gradient(top, #646464, #191919);
  background-image: linear-gradient(to bottom, #646464, #191919);
  border: 1px solid #323232;
  border-top-color: #505050;
}
.nf-button-dark:hover {
  background-color: #4b4b4b;
}
.nf-button-dark:active {
  background-color: #2f2f2f;
}
.nf-button-medium {
  padding: 10px 20px;
}
.btn-flat {
  font-size: 1.1vw;
  font-weight: 700;
  margin-right: 0.75em;
  padding: 0.57em 1.35em;
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.4);
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  background-image: none;
  background-color: rgba(0, 0, 0, 0.4);
}
.btn-flat .nf-icon-button-icon,
.btn-flat .playRing {
  margin-right: 0.71em;
  background-color: transparent;
  font-size: inherit;
  -webkit-transition: none;
  -o-transition: none;
  -moz-transition: none;
  transition: none;
}
.btn-flat .icon-button-mylist-added,
.btn-flat .icon-button-mylist-added-reverse {
  -webkit-transform: scale(1.5);
  -moz-transform: scale(1.5);
  -ms-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
}
.btn-flat .nf-icon-button-label {
  padding: 0;
  margin: 0;
  top: auto;
}
.btn-flat:hover {
  background-color: rgba(51, 51, 51, 0.4);
}
.btn-flat:hover .nf-icon-button-icon {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.btn-flat:hover .nf-icon-button-icon.icon-button-mylist-added,
.btn-flat:hover .nf-icon-button-icon.icon-button-mylist-added-reverse {
  -webkit-transform: scale(1.5);
  -moz-transform: scale(1.5);
  -ms-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
}
.btn-flat-primary {
  background-color: #e50914;
  border-color: #ff0a16;
}
.btn-flat-primary:hover {
  background-color: #ff0a16;
}
.icon-button-mylist-no-ring .icon-button-mylist-add:before {
  content: "\e641";
}
.icon-button-mylist-no-ring .icon-button-mylist-add-reverse:before {
  content: "\e641";
}
.icon-button-mylist-no-ring .icon-button-mylist-added:before {
  content: "\e804";
}
.icon-button-mylist-no-ring .icon-button-mylist-added-reverse:before {
  content: "\e804";
}
.icon-button-mylist-sharp .mylist-button .nf-icon-button-icon,
.icon-button-mylist-sharp .mylist-button.hovered .nf-icon-button-icon {
  background-color: transparent;
}
.icon-button-mylist-sharp .icon-button-mylist-add,
.icon-button-mylist-sharp .icon-button-mylist-add-reverse {
  font-size: 1.2vw;
}
.icon-button-mylist-sharp .icon-button-play:before {
  content: "\e646";
}
.icon-button-mylist-sharp .icon-button-mylist-add:before {
  content: "\f018";
}
.icon-button-mylist-sharp .icon-button-mylist-add-reverse:before {
  content: "\f018";
}
.icon-button-mylist-sharp .icon-button-mylist-added:before {
  content: "\e804";
}
.icon-button-mylist-sharp .icon-button-mylist-added-reverse:before {
  content: "\e804";
}
.nf-flat-button {
  font-size: 1vw;
  font-weight: 700;
  text-transform: uppercase;
  margin-right: 0.75em;
  padding: 0.57em 1.35em;
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.4);
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  background-image: none;
  background-color: rgba(0, 0, 0, 0.4);
}
.nf-flat-button .nf-flat-button-icon {
  vertical-align: middle;
  margin-right: 0.71em;
  background-color: transparent;
  font-size: inherit;
}
.nf-flat-button .nf-flat-button-icon.empty-label {
  margin-right: initial;
}
.nf-flat-button.no-icon .nf-flat-button-icon {
  display: none;
}
.nf-flat-button .nf-flat-button-text {
  vertical-align: middle;
  padding: 0;
  margin: 0;
  top: auto;
  white-space: nowrap;
}
.nf-flat-button .nf-icon-button-tooltip {
  display: none;
  position: absolute;
  top: -2.5vw;
  margin-top: 6px;
  left: 0.5vw;
  background: #fff;
  text-transform: uppercase;
  color: #000;
  width: 10vw;
  margin-left: -3.5vw;
  font-size: 0.8vw;
  font-weight: 700;
  padding: 2px 0;
  text-align: center;
}
.nf-flat-button .nf-icon-button-tooltip:hover {
  display: block;
}
.nf-flat-button .nf-icon-button-tooltip:before {
  content: initial;
  border-color: initial;
  border-style: initial;
  border-width: initial;
}
.nf-flat-button .nf-icon-button-tooltip:after {
  border-color: #fff transparent transparent transparent;
  border-style: solid;
  border-width: 3px 3px 0 3px;
  content: "";
  height: 0;
  left: 50%;
  margin-left: -2px;
  margin-bottom: -3px;
  position: absolute;
  bottom: 0;
  width: 0;
}
.nf-flat-button:hover {
  background-color: rgba(51, 51, 51, 0.4);
}
.nf-flat-button:hover .nf-flat-button-icon {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.nf-flat-button .nf-flat-button-icon-close,
.nf-flat-button .nf-flat-button-icon-episodes,
.nf-flat-button .nf-flat-button-icon-mylist-add,
.nf-flat-button .nf-flat-button-icon-mylist-added,
.nf-flat-button .nf-flat-button-icon-play,
.nf-flat-button .nf-flat-button-icon-restart {
  font-family: nf-icon;
}
.nf-flat-button .nf-flat-button-icon-play:before {
  content: "\e646";
}
.nf-flat-button .nf-flat-button-icon-episodes:before {
  content: "\e678";
}
.nf-flat-button .nf-flat-button-icon-mylist-add:before {
  content: "\e641";
}
.nf-flat-button .nf-flat-button-icon-mylist-added:before {
  content: "\e804";
}
.nf-flat-button .nf-flat-button-icon-restart:before {
  content: "\e752";
}
.nf-flat-button .nf-flat-button-icon-close:before {
  content: "\e762";
}
.nf-flat-button-primary {
  background-color: #e50914;
  border-color: #ff0a16;
}
.nf-flat-button-primary:hover {
  background-color: #ff0a16;
}
.nf-flat-button-type-borderless {
  font-size: inherit;
  margin: 0;
  background: 0 0;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  text-transform: none;
  font-weight: 400;
  border: 0.1em solid transparent;
}
.nf-flat-button-type-borderless:focus {
  border-color: #fff;
}
.nf-flat-button-type-focusable-static {
  font-size: inherit;
  border: 0.1em solid transparent;
}
.nf-flat-button-type-focusable-static:focus {
  border-color: #fff;
}
.lolomoRow {
  z-index: 1;
}
.billboard-row .billboard,
.billboard-row .billboard-originals {
  z-index: 0;
}
.billboard-row .billboard .button-layer,
.billboard-row .billboard-originals .button-layer {
  z-index: 10;
}
.billboard-row .billboard .vignette-layer,
.billboard-row .billboard-originals .vignette-layer {
  z-index: 8;
}
.billboard-row .billboard .play-hit-layer,
.billboard-row .billboard-originals .play-hit-layer {
  z-index: 9;
}
.billboard-row .billboard .meta-layer,
.billboard-row .billboard-originals .meta-layer {
  z-index: 10;
}
.billboard-row .billboard .image-layer,
.billboard-row .billboard-originals .image-layer {
  z-index: 5;
}
.billboard-row .billboard .image-layer.low,
.billboard-row .billboard-originals .image-layer.low {
  z-index: 4;
}
.billboard-row .billboard .image-layer.mid,
.billboard-row .billboard-originals .image-layer.mid {
  z-index: 6;
}
.billboard-row .billboard .image-layer.high,
.billboard-row .billboard-originals .image-layer.high {
  z-index: 7;
}
.billboard-row .billboard .bottom-layer,
.billboard-row .billboard-originals .bottom-layer {
  z-index: 2;
}
.billboard-row .billboard-presentation-tracking {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
@-webkit-keyframes kenBurns {
  0% {
    -webkit-transform: scale(1, 1) translateX(0);
    transform: scale(1, 1) translateX(0);
  }
  100% {
    -webkit-transform: scale(1.1, 1.1) translateX(-2%);
    transform: scale(1.1, 1.1) translateX(-2%);
  }
}
@-moz-keyframes kenBurns {
  0% {
    -moz-transform: scale(1, 1) translateX(0);
    transform: scale(1, 1) translateX(0);
  }
  100% {
    -moz-transform: scale(1.1, 1.1) translateX(-2%);
    transform: scale(1.1, 1.1) translateX(-2%);
  }
}
@-o-keyframes kenBurns {
  0% {
    -o-transform: scale(1, 1) translateX(0);
    transform: scale(1, 1) translateX(0);
  }
  100% {
    -o-transform: scale(1.1, 1.1) translateX(-2%);
    transform: scale(1.1, 1.1) translateX(-2%);
  }
}
@keyframes kenBurns {
  0% {
    -webkit-transform: scale(1, 1) translateX(0);
    -moz-transform: scale(1, 1) translateX(0);
    -o-transform: scale(1, 1) translateX(0);
    transform: scale(1, 1) translateX(0);
  }
  100% {
    -webkit-transform: scale(1.1, 1.1) translateX(-2%);
    -moz-transform: scale(1.1, 1.1) translateX(-2%);
    -o-transform: scale(1.1, 1.1) translateX(-2%);
    transform: scale(1.1, 1.1) translateX(-2%);
  }
}
@-webkit-keyframes kenFade {
  0% {
    opacity: 0.7;
  }
  100% {
    opacity: 0;
  }
}
@-moz-keyframes kenFade {
  0% {
    opacity: 0.7;
  }
  100% {
    opacity: 0;
  }
}
@-o-keyframes kenFade {
  0% {
    opacity: 0.7;
  }
  100% {
    opacity: 0;
  }
}
@keyframes kenFade {
  0% {
    opacity: 0.7;
  }
  100% {
    opacity: 0;
  }
}
.billboard-row .billboard-originals .full-screen {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
}
.billboard-row .billboard-originals .ken-burns-mask {
  background-color: #000;
  -webkit-animation-name: kenFade;
  -moz-animation-name: kenFade;
  -o-animation-name: kenFade;
  animation-name: kenFade;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-timing-function: ease-out;
  -moz-animation-timing-function: ease-out;
  -o-animation-timing-function: ease-out;
  animation-timing-function: ease-out;
  -webkit-animation-duration: 3s;
  -moz-animation-duration: 3s;
  -o-animation-duration: 3s;
  animation-duration: 3s;
}
.billboard-row .billboard-originals .ken-burns {
  -webkit-animation-name: kenBurns;
  -moz-animation-name: kenBurns;
  -o-animation-name: kenBurns;
  animation-name: kenBurns;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-timing-function: linear;
  -moz-animation-timing-function: linear;
  -o-animation-timing-function: linear;
  animation-timing-function: linear;
  -webkit-animation-duration: 4s;
  -moz-animation-duration: 4s;
  -o-animation-duration: 4s;
  animation-duration: 4s;
}
.billboard-row .billboard-originals .ken-blurs .blurs-image {
  -webkit-filter: blur(5px);
  filter: blur(5px);
  -webkit-animation-name: kenFade;
  -moz-animation-name: kenFade;
  -o-animation-name: kenFade;
  animation-name: kenFade;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-timing-function: ease-out;
  -moz-animation-timing-function: ease-out;
  -o-animation-timing-function: ease-out;
  animation-timing-function: ease-out;
  -webkit-animation-duration: 3s;
  -moz-animation-duration: 3s;
  -o-animation-duration: 3s;
  animation-duration: 3s;
}
.billboard-row .billboard-originals .dismiss-mask .ken-blurs .blurs-image {
  opacity: 0;
  -webkit-transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  -o-transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  -moz-transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
}
.billboard-row .billboard-originals .dismiss-mask .ken-burns-mask {
  opacity: 0;
  -webkit-transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  -o-transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  -moz-transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
}
.billboard-row .billboard-originals .info {
  left: 0;
  padding-left: 4%;
  width: 75%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.billboard-row .billboard-originals.background-image-starts-play .info {
  pointer-events: none;
}
.billboard-row
  .billboard-originals.background-image-starts-play
  .info
  .nf-icon-button,
.billboard-row
  .billboard-originals.background-image-starts-play
  .info
  .playLink {
  pointer-events: all;
}
.billboard-row .billboard-originals .logo-and-text {
  width: 49%;
}
.billboard-row .billboard-originals .title-logo {
  margin-bottom: 1.2vw;
}
.billboard-row .billboard-originals .billboard-title.isRtl {
  width: 90%;
  margin-bottom: 1.2vw;
}
.billboard-row .billboard-originals .billboard-title.isRtl .title-logo {
  margin-bottom: 0;
  padding-top: 40%;
  -moz-background-size: contain;
  background-size: contain;
  background-repeat: no-repeat;
  background-position: left top;
}
.billboard-row .billboard-originals .title {
  font-size: 3.5vw;
  margin-top: 4vw;
}
.billboard-row .billboard-originals .supplemental {
  color: #666;
  margin-bottom: 0.8vw;
  font-size: 1.6vw;
  font-weight: 700;
}
.billboard-row .billboard-originals .supplemental img {
  max-width: 100%;
}
.billboard-row .billboard-originals .supplemental .episode-title {
  color: #fff;
}
.billboard-row .billboard-originals .maturity-rating {
  padding-bottom: 1em;
}
.billboard-row .billboard-originals .mylist-button {
  font-size: 1.1vw;
  font-weight: 700;
  margin-right: 0.75em;
  padding: 0.57em 1.35em;
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.4);
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  background-image: none;
  background-color: rgba(0, 0, 0, 0.4);
}
.billboard-row .billboard-originals .mylist-button .nf-icon-button-icon,
.billboard-row .billboard-originals .mylist-button .playRing {
  margin-right: 0.71em;
  background-color: transparent;
  font-size: inherit;
  -webkit-transition: none;
  -o-transition: none;
  -moz-transition: none;
  transition: none;
}
.billboard-row .billboard-originals .mylist-button .icon-button-mylist-added,
.billboard-row
  .billboard-originals
  .mylist-button
  .icon-button-mylist-added-reverse {
  -webkit-transform: scale(1.5);
  -moz-transform: scale(1.5);
  -ms-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
}
.billboard-row .billboard-originals .mylist-button .nf-icon-button-label {
  padding: 0;
  margin: 0;
  top: auto;
}
.billboard-row .billboard-originals .mylist-button:hover {
  background-color: rgba(51, 51, 51, 0.4);
}
.billboard-row .billboard-originals .mylist-button:hover .nf-icon-button-icon {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.billboard-row
  .billboard-originals
  .mylist-button:hover
  .nf-icon-button-icon.icon-button-mylist-added,
.billboard-row
  .billboard-originals
  .mylist-button:hover
  .nf-icon-button-icon.icon-button-mylist-added-reverse {
  -webkit-transform: scale(1.5);
  -moz-transform: scale(1.5);
  -ms-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
}
.billboard-row .billboard-originals .billboard-links > a {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.billboard-row .billboard-originals .icon-button-mylist-add:before {
  content: "\e641";
}
.billboard-row .billboard-originals .icon-button-mylist-add-reverse:before {
  content: "\e641";
}
.billboard-row .billboard-originals .icon-button-mylist-added:before {
  content: "\e804";
}
.billboard-row .billboard-originals .icon-button-mylist-added-reverse:before {
  content: "\e804";
}
.billboard-row .billboard-originals.full-bleed-billboard .hero {
  height: auto;
  width: 100%;
  left: 0;
  right: 0;
}
.billboard-row .billboard-originals.full-bleed-billboard .hero-vignette {
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(rgba(20, 20, 20, 0)),
    color-stop(15%, rgba(20, 20, 20, 0.15)),
    color-stop(29%, rgba(20, 20, 20, 0.35)),
    color-stop(44%, rgba(20, 20, 20, 0.58)),
    color-stop(68%, #141414),
    to(#141414)
  );
  background-image: -webkit-linear-gradient(
    top,
    rgba(20, 20, 20, 0) 0,
    rgba(20, 20, 20, 0.15) 15%,
    rgba(20, 20, 20, 0.35) 29%,
    rgba(20, 20, 20, 0.58) 44%,
    #141414 68%,
    #141414 100%
  );
  background-image: -moz-linear-gradient(
    top,
    rgba(20, 20, 20, 0) 0,
    rgba(20, 20, 20, 0.15) 15%,
    rgba(20, 20, 20, 0.35) 29%,
    rgba(20, 20, 20, 0.58) 44%,
    #141414 68%,
    #141414 100%
  );
  background-image: -o-linear-gradient(
    top,
    rgba(20, 20, 20, 0) 0,
    rgba(20, 20, 20, 0.15) 15%,
    rgba(20, 20, 20, 0.35) 29%,
    rgba(20, 20, 20, 0.58) 44%,
    #141414 68%,
    #141414 100%
  );
  background-image: linear-gradient(
    to bottom,
    rgba(20, 20, 20, 0) 0,
    rgba(20, 20, 20, 0.15) 15%,
    rgba(20, 20, 20, 0.35) 29%,
    rgba(20, 20, 20, 0.58) 44%,
    #141414 68%,
    #141414 100%
  );
  -moz-background-size: 100% 100%;
  background-size: 100% 100%;
  background-position: 0 top;
  background-repeat: repeat-x;
  background-color: transparent;
  width: 100%;
  height: 22.8vw;
  position: absolute;
  left: 0;
  right: 0;
  top: auto;
  bottom: -17vw;
}
.billboard-row .billboard-originals.full-bleed-billboard .supplemental,
.billboard-row .billboard-originals.full-bleed-billboard .synopsis {
  color: #fff;
}
.billboard-row .billboard-originals.light-tone .billboard-motion {
  background-color: #fff;
}
.billboard-row .billboard-originals.light-tone .supplemental,
.billboard-row .billboard-originals.light-tone .synopsis,
.billboard-row .billboard-originals.light-tone .title,
.billboard-row .billboard-originals.light-tone.takeover-billboard .meta {
  color: #333;
}
.billboard-row .billboard-originals.light-tone .btn-flat {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}
.billboard-row
  .billboard-originals.light-tone.countdown-billboard
  .clockFaceContainer
  span,
.billboard-row
  .billboard-originals.light-tone.countdown-billboard
  .clockFaceLabel {
  color: #333;
}
.billboard-row
  .billboard-originals.light-tone.countdown-billboard
  .clockFacesWrapper {
  background-position: 0 205%;
}
.billboard-row
  .billboard-originals.full-bleed-billboard
  .billboard-motion
  .hero-vignette {
  bottom: 0;
}
.billboard-originals.light-tone .loading-mask {
  background-color: rgba(255, 255, 255, 0.7);
}
.billboard-motion {
  position: relative;
  background-color: #000;
  width: 100%;
  height: 56.25vw;
}
.billboard-motion .loading-mask,
.billboard-motion .static-image {
  position: absolute;
  background-position: center center;
  -moz-background-size: cover;
  background-size: cover;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  opacity: 1;
  -webkit-transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  -o-transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  -moz-transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  transition: opacity 0.4s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
}
.billboard-motion .loading-mask {
  background-color: rgba(0, 0, 0, 0.7);
}
.billboard-motion .audio-btn {
  display: none;
}
.billboard-motion .audio-btn .nf-icon-button-label {
  display: none;
}
.billboard-motion.dismiss-mask .loading-mask {
  opacity: 0;
}
.billboard-motion.dismiss-static .audio-btn {
  display: block;
}
.billboard-motion.dismiss-static .static-image {
  opacity: 0;
}
.billboard-row .awards-billboard .info {
  top: 50%;
}
.billboard-row .awards-billboard .logo-and-text {
  width: 53%;
}
.billboard-row .awards-billboard .supplemental {
  font-size: 1.4vw;
}
.billboard-row .award-headline {
  position: absolute;
  top: 9.4vw;
  left: -3vw;
  width: 45.24vw;
}
.billboard-row .awards-billboard .info .title-logo {
  width: 76%;
}
.billboard-row .billboard .billboard-pane-content-refresh {
  display: table;
  width: 40%;
  height: 100%;
  left: 4%;
}
@media screen and (min-width: 1500px) {
  .billboard-row .billboard .billboard-pane-content-refresh {
    left: 60px;
  }
}
.billboard-row
  .billboard
  .billboard-pane-content-refresh
  .info.content-refresh {
  width: 40%;
  position: relative;
  top: 0;
  height: 100%;
  left: 0;
  display: table-cell;
  vertical-align: middle;
}
@media screen and (min-width: 1500px) {
  .billboard-row
    .billboard
    .billboard-pane-content-refresh
    .info.content-refresh {
    left: 0;
  }
}
.billboard-row
  .billboard
  .billboard-pane-content-refresh
  .info.content-refresh
  .content-refresh {
  margin-bottom: 7%;
  margin-top: 0;
}
.billboard-row
  .billboard
  .billboard-pane-content-refresh
  .info.content-refresh
  .title-content-refresh {
  font-size: 2.5vw;
}
.billboard-row
  .billboard
  .billboard-pane-content-refresh
  .info.content-refresh
  .new-episodes-badge {
  color: #c01c00;
  font-size: 1vw;
  font-weight: 700;
  margin-bottom: 2%;
}
.billboard-row
  .billboard
  .billboard-pane-content-refresh
  .info.content-refresh
  .title-treatment-content-refresh {
  max-height: 14%;
  max-width: 70%;
}
@media screen and (max-width: 500px) {
  .billboard-row
    .billboard
    .billboard-pane-content-refresh
    .info.content-refresh
    .title-treatment-content-refresh {
    max-height: 10%;
  }
}
.billboard-row
  .billboard
  .billboard-pane-content-refresh
  .info.content-refresh
  .title-treatment-content-refresh.title-logo {
  width: auto;
}
.billboard-row
  .billboard
  .billboard-pane-content-refresh
  .info.content-refresh
  .content-refresh-link {
  font-size: 1vw;
  font-weight: 700;
  width: 100%;
}
.billboard-row
  .billboard
  .billboard-pane-content-refresh
  .info.content-refresh
  .content-refresh-link
  .row-chevron {
  font-size: 0.7vw;
  margin-left: 0.7em;
  font-weight: 700;
}
.billboard-row
  .billboard
  .billboard-pane-content-refresh
  .info.content-refresh
  .billboard-pane-content-refresh
  .billboard-row
  .billboard
  .info
  .meta {
  margin-top: 0;
}
.billboard-row
  .billboard
  .billboard-pane-content-refresh
  .info.content-refresh
  .actions-content-refresh {
  margin-top: 12px;
}
@media screen and (max-width: 500px) {
  .billboard-row
    .billboard
    .billboard-pane-content-refresh
    .info.content-refresh
    .actions-content-refresh {
    margin-top: 4px;
  }
}
.billboard-row .countdown-billboard .logo-and-text {
  width: 53%;
}
.billboard-row .countdown-billboard .supplemental {
  font-size: 1.4vw;
  margin-top: 0.2vw;
  margin-bottom: 1.1vw;
}
.billboard-row .countdown-billboard .info {
  top: auto;
  bottom: 5%;
}
.billboard-row .countdown-billboard .info .title-logo {
  width: 90%;
}
.billboard-row .countdown-billboard .countdownClockContainer {
  overflow: auto;
  width: 70%;
}
.billboard-row .countdown-billboard.countdown-ended .countdownClockContainer {
  display: none;
}
.billboard-row .countdown-billboard .clockFacesWrapper {
  background-position: 0 0;
  -moz-background-size: 100% 291%;
  background-size: 100% 291%;
  overflow: auto;
  margin-bottom: 1%;
}
.billboard-row .countdown-billboard .clockFaceContainer {
  float: left;
  margin-right: 1.9%;
  text-align: center;
  padding: 4% 0 2% 0;
  width: 23.35%;
}
.billboard-row .countdown-billboard .clockFaceContainer.spritesheet span {
  display: inline-block;
  width: 34%;
  padding-bottom: 75%;
  -moz-background-size: 1700% 653%;
  background-size: 1700% 653%;
}
.billboard-row .countdown-billboard .clockFaceContainer span {
  background-image: url("");
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
  font-size: 3.5vw;
  padding-bottom: 0;
  line-height: 3vw;
}
.billboard-row
  .countdown-billboard
  .clockFaceContainer.spritesheet
  .firstDigit {
  margin-right: 5%;
}
.billboard-row .countdown-billboard .clockFaceContainer.secs {
  margin-right: 0;
}
.billboard-row .countdown-billboard .clockFaceContainer.secs .firstDigit.zero {
  background-position: 1400% 100%;
}
.billboard-row .countdown-billboard .clockFaceContainer .value0 {
  background-position: 1400% 100%;
}
.billboard-row .countdown-billboard .clockFaceContainer .value1 {
  background-position: 700% 200%;
}
.billboard-row .countdown-billboard .clockFaceContainer .value2 {
  background-position: 600% 200%;
}
.billboard-row .countdown-billboard .clockFaceContainer .value3 {
  background-position: 500% 200%;
}
.billboard-row .countdown-billboard .clockFaceContainer .value4 {
  background-position: 400% 200%;
}
.billboard-row .countdown-billboard .clockFaceContainer .value5 {
  background-position: 300% 200%;
}
.billboard-row .countdown-billboard .clockFaceContainer .value6 {
  background-position: 200% 200%;
}
.billboard-row .countdown-billboard .clockFaceContainer .value7 {
  background-position: 1700% 100%;
}
.billboard-row .countdown-billboard .clockFaceContainer .value8 {
  background-position: 1600% 100%;
}
.billboard-row .countdown-billboard .clockFaceContainer .value9 {
  background-position: 1500% 100%;
}
.billboard-row .countdown-billboard .billboard-links {
  clear: both;
}
.billboard-row .countdown-billboard .spritesheet .clockFaceLabel {
  margin-top: 20%;
}
.billboard-row .countdown-billboard .clockFaceLabel {
  font-size: 1.3vw;
  margin-top: 42%;
  font-weight: 700;
}
.billboard-row.takeover {
  padding-bottom: 49%;
  overflow: hidden;
}
.billboard-row .takeover-billboard.show-info-btn .billboard-motion .audio-btn {
  opacity: 1;
}
.billboard-row .takeover-billboard .billboard-motion .embedded-components {
  top: 76%;
  right: 3.8vw;
}
.billboard-row .takeover-billboard .billboard-motion .audio-btn {
  opacity: 0;
  -webkit-transition: opacity 0.2s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  -o-transition: opacity 0.2s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  -moz-transition: opacity 0.2s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  transition: opacity 0.2s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
}
.billboard-row .takeover-billboard .billboard-motion .static-image {
  -moz-background-size: contain;
  background-size: contain;
}
.billboard-row
  .takeover-billboard.billboard-originals.full-bleed-billboard
  .billboard-motion
  .hero-vignette {
  background: 0 0;
}
.billboard-row .takeover-billboard .info {
  top: 50%;
}
.billboard-row .takeover-billboard .info .meta {
  margin: 0;
  color: #fff;
}
.billboard-row .takeover-billboard .info .title-logo {
  width: 97%;
  margin-bottom: 0.8vw;
}
.billboard-row .takeover-billboard .info .billboard-links {
  margin-top: 0.8vw;
}
.billboard-row .takeover-billboard .takeover-accolades {
  position: absolute;
  top: 10vw;
  width: 38vw;
  left: 1.6vw;
}
.billboard-row .takeover-billboard .logo-and-text {
  width: 53%;
}
.billboard-row .takeover-billboard .supplemental {
  font-size: 1.4vw;
}
.billboard-row .embedded-components {
  font-size: 2.5vw;
  position: absolute;
  right: 2vw;
  top: 60%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
}
.flexcontainer {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.flexcontainer.column {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.flexcontainer.column.reverse {
  -webkit-box-orient: vertical;
  -webkit-box-direction: reverse;
  -webkit-flex-direction: column-reverse;
  -moz-box-orient: vertical;
  -moz-box-direction: reverse;
  -ms-flex-direction: column-reverse;
  flex-direction: column-reverse;
}
.billboard-row.takeover ~ .lolomoRow {
  -webkit-transition: opacity 0.5s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  -o-transition: opacity 0.5s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  -moz-transition: opacity 0.5s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
  transition: opacity 0.5s cubic-bezier(0.665, 0.235, 0.265, 0.8) 0s;
}
.billboard-row.dim-lolomo ~ .lolomoRow {
  opacity: 0.25;
}
.billboard-row.takeover + .lolomoRow {
  margin-top: 1vw;
}
.bigRowItem .forward-leaning,
.billboard-links.forward-leaning,
.content-refresh .forward-leaning,
.profiles-billboard .forward-leaning {
  margin-top: 1vw;
}
.bigRowItem .forward-leaning .btn-flat,
.bigRowItem .forward-leaning .btn-flat-primary,
.bigRowItem .forward-leaning .nf-flat-button,
.bigRowItem .forward-leaning .nf-flat-button-primary,
.bigRowItem .forward-leaning .nf-icon-button:not(.audio-btn),
.billboard-links.forward-leaning .btn-flat,
.billboard-links.forward-leaning .btn-flat-primary,
.billboard-links.forward-leaning .nf-flat-button,
.billboard-links.forward-leaning .nf-flat-button-primary,
.billboard-links.forward-leaning .nf-icon-button:not(.audio-btn),
.content-refresh .forward-leaning .btn-flat,
.content-refresh .forward-leaning .btn-flat-primary,
.content-refresh .forward-leaning .nf-flat-button,
.content-refresh .forward-leaning .nf-flat-button-primary,
.content-refresh .forward-leaning .nf-icon-button:not(.audio-btn),
.profiles-billboard .forward-leaning .btn-flat,
.profiles-billboard .forward-leaning .btn-flat-primary,
.profiles-billboard .forward-leaning .nf-flat-button,
.profiles-billboard .forward-leaning .nf-flat-button-primary,
.profiles-billboard .forward-leaning .nf-icon-button:not(.audio-btn) {
  background-color: rgba(51, 51, 51, 0.4);
  border-width: 0;
  padding: 0.75em 2.3em;
  height: 1.2vw;
  -webkit-border-radius: 0.2vw;
  -moz-border-radius: 0.2vw;
  border-radius: 0.2vw;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  font-size: 1.1vw;
}
.bigRowItem .forward-leaning .btn-flat-primary:hover,
.bigRowItem .forward-leaning .btn-flat:hover,
.bigRowItem .forward-leaning .nf-flat-button-primary:hover,
.bigRowItem .forward-leaning .nf-flat-button:hover,
.bigRowItem .forward-leaning .nf-icon-button:not(.audio-btn):hover,
.billboard-links.forward-leaning .btn-flat-primary:hover,
.billboard-links.forward-leaning .btn-flat:hover,
.billboard-links.forward-leaning .nf-flat-button-primary:hover,
.billboard-links.forward-leaning .nf-flat-button:hover,
.billboard-links.forward-leaning .nf-icon-button:not(.audio-btn):hover,
.content-refresh .forward-leaning .btn-flat-primary:hover,
.content-refresh .forward-leaning .btn-flat:hover,
.content-refresh .forward-leaning .nf-flat-button-primary:hover,
.content-refresh .forward-leaning .nf-flat-button:hover,
.content-refresh .forward-leaning .nf-icon-button:not(.audio-btn):hover,
.profiles-billboard .forward-leaning .btn-flat-primary:hover,
.profiles-billboard .forward-leaning .btn-flat:hover,
.profiles-billboard .forward-leaning .nf-flat-button-primary:hover,
.profiles-billboard .forward-leaning .nf-flat-button:hover,
.profiles-billboard .forward-leaning .nf-icon-button:not(.audio-btn):hover {
  -webkit-box-shadow: 0 0.6vw 1vw -0.4vw rgba(0, 0, 0, 0.35);
  -moz-box-shadow: 0 0.6vw 1vw -0.4vw rgba(0, 0, 0, 0.35);
  box-shadow: 0 0.6vw 1vw -0.4vw rgba(0, 0, 0, 0.35);
  background-color: #e6e6e6;
  color: #000;
  height: 1.2vw;
}
.bigRowItem .forward-leaning .btn-flat,
.bigRowItem .forward-leaning .nf-flat-button .annotation,
.bigRowItem .forward-leaning .nf-flat-button .nf-flat-button-text,
.bigRowItem .forward-leaning .nf-icon-button .nf-icon-button-label,
.billboard-links.forward-leaning .btn-flat,
.billboard-links.forward-leaning .nf-flat-button .annotation,
.billboard-links.forward-leaning .nf-flat-button .nf-flat-button-text,
.billboard-links.forward-leaning .nf-icon-button .nf-icon-button-label,
.content-refresh .forward-leaning .btn-flat,
.content-refresh .forward-leaning .nf-flat-button .annotation,
.content-refresh .forward-leaning .nf-flat-button .nf-flat-button-text,
.content-refresh .forward-leaning .nf-icon-button .nf-icon-button-label,
.profiles-billboard .forward-leaning .btn-flat,
.profiles-billboard .forward-leaning .nf-flat-button .annotation,
.profiles-billboard .forward-leaning .nf-flat-button .nf-flat-button-text,
.profiles-billboard .forward-leaning .nf-icon-button .nf-icon-button-label {
  text-transform: none;
}
.billboard-links.forward-leaning,
.content-refresh .forward-leaning,
.profiles-billboard .forward-leaning {
  line-height: 88%;
}
.billboard.trailer-billboard .billboard-title {
  min-height: 13.2vw;
  position: relative;
}
.billboard.trailer-billboard .billboard-title .title {
  position: absolute;
  bottom: 0;
}
.billboard.trailer-billboard .embedded-components {
  right: 0;
  position: relative;
  margin-top: -20vw;
  top: 0;
  font-size: 1vw;
}
.billboard.trailer-billboard .embedded-components .nf-icon-button {
  margin: auto 1.1vw auto 0;
}
.billboard.trailer-billboard
  .embedded-components
  .nf-icon-button
  .nf-icon-button-icon {
  font-size: 2.4vw;
}
.billboard.trailer-billboard .hero-image-wrapper {
  width: 100%;
  height: 100%;
}
.billboard.trailer-billboard .maturity-rating {
  border: solid 3px #dcdcdc;
  border-style: none none none solid;
  background-color: rgba(51, 51, 51, 0.6);
  font-size: 1.1vw;
  padding: 0.5vw 3.5vw 0.5vw 0.8vw;
}
.billboard.trailer-billboard .maturity-rating .maturity-number {
  padding: 0;
  border-width: 0;
}
.billboard.trailer-billboard .maturity-rating:empty {
  visibility: hidden;
}
.billboard.trailer-billboard .info {
  top: 0;
  width: 40%;
  height: 130%;
}
.billboard.trailer-billboard .info .logo-and-text {
  margin: 0;
  width: 100%;
  padding-top: 10vw;
  position: relative;
}
.billboard.trailer-billboard .info .logo-and-text .supplemental,
.billboard.trailer-billboard .info .logo-and-text .synopsis {
  margin-top: 0.2vw;
}
.billboard.trailer-billboard
  .info
  .logo-and-text
  .maturity-rating
  .maturity-number {
  border-width: 0;
  font-size: 1.2em;
  font-weight: 700;
  padding: 0;
}
.billboard.trailer-billboard .info .logo-and-text .supplemental {
  margin: 1vw 0 0 0;
}
.billboard.trailer-billboard .info .logo-and-text .synopsis {
  margin-top: 0.1vw;
}
.billboard.trailer-billboard .info .logo-and-text .synopsis.no-supplemental {
  margin: 1vw 0 0 0;
}
.billboard.trailer-billboard .info .logo-and-text .title-logo {
  margin: 0;
}
.billboard.trailer-billboard .info .trailer-vignette {
  background: -webkit-gradient(
    linear,
    left top,
    right top,
    from(rgba(0, 0, 0, 0.4)),
    to(rgba(0, 0, 0, 0))
  );
  background: -webkit-linear-gradient(
    left,
    rgba(0, 0, 0, 0.4) 0,
    rgba(0, 0, 0, 0) 100%
  );
  background: -moz-linear-gradient(
    left,
    rgba(0, 0, 0, 0.4) 0,
    rgba(0, 0, 0, 0) 100%
  );
  background: -o-linear-gradient(
    left,
    rgba(0, 0, 0, 0.4) 0,
    rgba(0, 0, 0, 0) 100%
  );
  background: linear-gradient(
    to right,
    rgba(0, 0, 0, 0.4) 0,
    rgba(0, 0, 0, 0) 100%
  );
  background-blend-mode: multiply;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 0;
}
.episode-badge,
.new-badge {
  color: #fff;
  background-color: #e50914;
  padding: 0 0.5em;
  display: inline-block;
  margin-right: 0.6em;
  margin-top: 0.5em;
  font-size: 0.7em;
  vertical-align: bottom;
  line-height: 1.8em;
  height: 1.8em;
  font-weight: 700;
}
.member-footer {
  max-width: 980px;
  margin: 20px auto 0;
  padding: 0 4%;
  color: grey;
}
.member-footer .social-links {
  margin-bottom: 1em;
}
.member-footer .social-links .social-link {
  margin-right: 15px;
  display: inline-block;
  vertical-align: middle;
}
.member-footer .social-links .social-link .svg-icon {
  fill: grey;
  height: 25px;
  width: 36px;
}
.member-footer .member-footer-help {
  font-size: 16px;
  margin-bottom: 30px;
  color: #fff;
  padding: 0;
}
.member-footer .member-footer-links {
  font-size: 13px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-align: start;
  -webkit-align-items: flex-start;
  -moz-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  margin: 0 0 14px 0;
  padding: 0;
}
.member-footer .member-footer-link-wrapper {
  list-style-type: none;
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 50%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 50%;
  flex: 0 0 50%;
  margin-bottom: 16px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
@media (min-width: 800px) {
  .member-footer .member-footer-link-wrapper {
    -webkit-flex-basis: 25%;
    -ms-flex-preferred-size: 25%;
    flex-basis: 25%;
  }
}
.member-footer .member-footer-link {
  color: grey;
  text-decoration: none;
}
.member-footer .member-footer-link:hover {
  text-decoration: underline;
}
.member-footer .member-footer-link-update {
  font-weight: 700;
}
.member-footer .member-footer-copyright {
  font-size: 11px;
  margin-bottom: 15px;
}
.member-footer .member-footer-copyright-instance {
  padding: 0 4px;
  display: inline-block;
}
.member-footer .service-code {
  margin-bottom: 20px;
  font-size: 13px;
  padding: 0.5em;
}
.service-code {
  background: 0 0;
  color: grey;
  border: solid 1px grey;
  font-size: 1.3rem;
  padding: 0.5rem;
}
.service-code:hover {
  cursor: pointer;
  color: #fff;
}
.sortGallery {
  float: right;
  font-size: 14px;
  text-align: right;
}
.sortGallery .nfDropDown.theme-lakira {
  margin-left: 10px;
  min-width: 240px;
}
.sortGallery ul.maturitySelectors li {
  display: inline-block;
  list-style: none;
  margin-left: 13px;
}
.sortGallery ul.maturitySelectors li label {
  display: inline;
}
.sortGallery ul.maturitySelectors li input {
  display: none;
}
.sortGallery ul.maturitySelectors li input + label {
  border: 1px solid #333;
  padding: 6px;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
  display: inline-block;
  position: relative;
  margin-right: 3px;
  top: 2px;
}
.sortGallery ul.maturitySelectors li input:checked + label {
  border: 1px solid #333;
  color: #99a1a7;
}
.sortGallery ul.maturitySelectors li input:checked + label:after {
  content: "\2714";
  font-size: 12px;
  position: absolute;
  top: -1px;
  left: 1px;
  color: #fff;
}
.breadCrumbs {
  font-size: 18px;
  color: grey;
}
.breadCrumbs ul {
  padding: 0;
  margin: 0;
}
.breadCrumbs ul li {
  list-style: none;
  display: inline;
  padding-right: 10px;
  z-index: 3;
  position: relative;
}
.breadCrumbs ul li a {
  color: grey;
}
.breadCrumbs ul li:after {
  padding-left: 10px;
  content: ">";
}
.nfDropDown.theme-aro {
  position: relative;
  text-align: left;
  min-width: 240px;
}
.nfDropDown.theme-aro .label {
  line-height: 28px;
  letter-spacing: 1px;
  font-size: 1rem;
  font-weight: 700;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: inline-block;
  color: #fff;
  background-color: rgba(0, 0, 0, 0.7);
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
  position: relative;
  padding: 0 50px 0 6px;
}
.nfDropDown.theme-aro .label:hover {
  cursor: pointer;
}
.nfDropDown.theme-aro .label .arrow {
  border-color: #fff transparent transparent;
  border-style: solid;
  border-width: 5px 5px 0;
  height: 0;
  position: absolute;
  right: 10px;
  top: 44%;
  width: 0;
}
.nfDropDown.theme-aro .label.loading {
  visibility: hidden;
}
.nfDropDown.theme-aro .sub-menu {
  position: absolute;
  background-color: rgba(0, 0, 0, 0.9);
  overflow-x: hidden;
  z-index: 2;
  padding: 0;
  margin: 0;
  border: 1px solid #fff;
  top: 2rem;
  left: 0;
  font-size: 1rem;
  opacity: 0;
}
.nfDropDown.theme-aro .sub-menu .sub-menu-list,
.nfDropDown.theme-aro .sub-menu .sub-menu-list-special {
  padding: 5px 0;
  margin: 0;
}
.nfDropDown.theme-aro .sub-menu .sub-menu-item a {
  padding: 1px 20px 1px 10px;
}
.nfDropDown.theme-aro .sub-menu .sub-menu-link {
  display: inline-block;
  width: 100%;
  padding: 1px 0;
  color: #fff;
}
.nfDropDown.theme-aro .sub-menu .sub-menu-link:hover {
  text-decoration: underline;
}
.nfDropDown.theme-aro .sub-menu::-webkit-scrollbar {
  width: 10px;
  background-color: #333;
}
.nfDropDown.theme-aro .sub-menu::-webkit-scrollbar:hover {
  background-color: #4d4d4d;
}
.nfDropDown.theme-aro .sub-menu::-webkit-scrollbar-thumb {
  width: 6px;
  background-color: grey;
}
.nfDropDown.theme-aro .sub-menu::-webkit-scrollbar-thumb:hover {
  background-color: #ccc;
}
.nfDropDown.theme-aro .sub-menu::-webkit-scrollbar-corner {
  background-color: #333;
}
.nfDropDown.theme-aro.widthRestricted {
  display: inline-block;
  position: relative;
}
.nfDropDown.theme-aro.widthRestricted .label {
  width: 100%;
}
.nfDropDown.theme-aro.widthRestricted .sub-menu {
  min-width: 100%;
  white-space: nowrap;
}
.nfDropDown.theme-aro.widthRestricted .sub-menu .sub-menu-list,
.nfDropDown.theme-aro.widthRestricted .sub-menu .sub-menu-list-special {
  width: 100%;
}
.gallery .aro-gallery-header {
  padding-bottom: 3vw;
}
.aro-fallback-gallery {
  padding-top: 3vw;
}
.aro-gallery-header {
  padding-top: 3vw;
  min-height: 44px;
  margin: 0 4%;
}
@media screen and (min-width: 1500px) {
  .aro-gallery-header {
    margin: 0 60px;
  }
}
.aro-gallery-header .genreTitle {
  font-size: 2vw;
  font-weight: 700;
  white-space: nowrap;
  margin-right: 15px;
}
@media only screen and (max-width: 1024px) {
  .aro-gallery-header .genreTitle {
    font-size: 4vw;
  }
}
.aro-gallery-header .subgenres {
  display: inline-block;
  vertical-align: top;
  margin-top: 7px;
}
.aro-gallery-header .subgenres .sub-menu {
  padding: 5px 0;
  z-index: 20;
}
.aro-gallery-header .subgenres .sub-menu .sub-menu-link {
  white-space: nowrap;
}
.aro-genre-details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: start;
  -webkit-justify-content: flex-start;
  -moz-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
}
.aro-genre-details .subgenres {
  margin: 0 30px;
}
.aro-toggle {
  margin-left: auto;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  z-index: 2;
}
.aro-toggle .aro-row-toggle {
  width: 44px;
  height: 28px;
  background: rgba(0, 0, 0, 0.7);
  border: 1px solid #fff;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.aro-toggle .aro-grid {
  width: auto;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  border: 1px solid #fff;
  opacity: 0.65;
  background: rgba(0, 0, 0, 0.1);
  border-left: none;
}
.aro-toggle .aro-grid:hover {
  opacity: 1;
}
.aro-toggle .aro-grid-toggle {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  height: 28px;
  width: 44px;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  cursor: pointer;
}
.aro-toggle .svg-icon-rows {
  width: 13px;
  height: 13px;
  fill: #fff;
}
.aro-toggle .svg-icon-grid {
  width: 13px;
  height: 13px;
  color: #fff;
}
.aro-toggle.grid-selected .aro-row-toggle {
  cursor: pointer;
  opacity: 0.65;
  background: rgba(0, 0, 0, 0.1);
  border-right: none;
}
.aro-toggle.grid-selected .aro-row-toggle:hover {
  opacity: 1;
}
.aro-toggle.grid-selected .aro-grid {
  background: rgba(0, 0, 0, 0.7);
  opacity: 1;
  border-left: 1px solid #fff;
}
.aro-toggle.grid-selected .aro-grid-toggle {
  cursor: auto;
}
.galleryHeader .title {
  display: inline-block;
  margin-right: 20px;
  line-height: 36px;
}
.galleryHeader .title .genreTitle {
  font-size: 26px;
}
.galleryHeader .subgenres {
  display: inline-block;
  vertical-align: top;
  margin-top: 7px;
}
.galleryHeader .subgenres .sub-menu {
  padding: 5px 0;
  z-index: 20;
}
.galleryHeader .subgenres .sub-menu .sub-menu-link {
  white-space: nowrap;
}
.title .numVideos {
  color: #666;
  font-size: 24px;
}
#playerContainer,
#playerFrame,
#playerWrapper {
  position: absolute;
  z-index: 1;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  background-color: #000;
  font-size: 18px;
}
#playerContainer.kids-player,
#playerFrame.kids-player,
#playerWrapper.kids-player {
  font-size: 16px;
}
.content-preview-watermark {
  position: absolute;
  left: 0;
  right: 0;
  margin: 0 auto;
  font-size: 18px;
  color: #cdcdcd;
}
.rowContainer {
  position: relative;
  z-index: 0;
}
.rowContainer .rowContent {
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.rowContainer .rowContent .slider {
  z-index: 2;
}
.rowContainer .rowContent .slider .handle {
  background: rgba(20, 20, 20, 0.5);
}
.rowContainer .rowContent .slider:hover .handle.active:hover {
  background: rgba(20, 20, 20, 0.7);
}
@media screen and (max-width: 499px) {
  .rowContainer .rowContent .slider .row-with-x-columns .slider-item {
    width: 50%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .rowContainer .rowContent .slider .row-with-x-columns .slider-item {
    width: 33.333333%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .rowContainer .rowContent .slider .row-with-x-columns .slider-item {
    width: 25%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .rowContainer .rowContent .slider .row-with-x-columns .slider-item {
    width: 20%;
  }
}
@media screen and (min-width: 1400px) {
  .rowContainer .rowContent .slider .row-with-x-columns .slider-item {
    width: 16.66666667%;
  }
}
.lolomoRow,
.rowContainer {
  -webkit-transition: -webkit-transform 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s;
  transition: -webkit-transform 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s;
  -o-transition: -o-transform 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s;
  -moz-transition: transform 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s,
    -moz-transform 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s;
  transition: transform 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s;
  transition: transform 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s,
    -webkit-transform 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s,
    -moz-transform 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s,
    -o-transform 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s;
}
.lolomoRow.jawBoneOpen ~ .lolomoRow,
.rowContainer.jawBoneOpen ~ .rowContainer {
  -webkit-transform: translate3d(0, 37vw, 0);
  -moz-transform: translate3d(0, 37vw, 0);
  transform: translate3d(0, 37vw, 0);
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .lolomoRow.jawBoneOpen ~ .lolomoRow,
  .rowContainer.jawBoneOpen ~ .rowContainer {
    -webkit-transform: translate3d(0, 42vw, 0);
    -moz-transform: translate3d(0, 42vw, 0);
    transform: translate3d(0, 42vw, 0);
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .lolomoRow.jawBoneOpen ~ .lolomoRow,
  .rowContainer.jawBoneOpen ~ .rowContainer {
    -webkit-transform: translate3d(0, 37vw, 0);
    -moz-transform: translate3d(0, 37vw, 0);
    transform: translate3d(0, 37vw, 0);
  }
}
@media screen and (min-width: 1400px) {
  .lolomoRow.jawBoneOpen ~ .lolomoRow,
  .rowContainer.jawBoneOpen ~ .rowContainer {
    -webkit-transform: translate3d(0, 32vw, 0);
    -moz-transform: translate3d(0, 32vw, 0);
    transform: translate3d(0, 32vw, 0);
  }
}
@media screen and (max-width: 499px) {
  .lolomoRow.bigRowOpen ~ .lolomoRow.jawBoneOpen ~ .lolomoRow,
  .lolomoRow.jawBoneOpen ~ .lolomoRow.bigRowOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 44vw, 0);
    -moz-transform: translate3d(0, 44vw, 0);
    transform: translate3d(0, 44vw, 0);
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .lolomoRow.bigRowOpen ~ .lolomoRow.jawBoneOpen ~ .lolomoRow,
  .lolomoRow.jawBoneOpen ~ .lolomoRow.bigRowOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 58vw, 0);
    -moz-transform: translate3d(0, 58vw, 0);
    transform: translate3d(0, 58vw, 0);
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .lolomoRow.bigRowOpen ~ .lolomoRow.jawBoneOpen ~ .lolomoRow,
  .lolomoRow.jawBoneOpen ~ .lolomoRow.bigRowOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 67vw, 0);
    -moz-transform: translate3d(0, 67vw, 0);
    transform: translate3d(0, 67vw, 0);
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .lolomoRow.bigRowOpen ~ .lolomoRow.jawBoneOpen ~ .lolomoRow,
  .lolomoRow.jawBoneOpen ~ .lolomoRow.bigRowOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 66vw, 0);
    -moz-transform: translate3d(0, 66vw, 0);
    transform: translate3d(0, 66vw, 0);
  }
}
@media screen and (min-width: 1400px) {
  .lolomoRow.bigRowOpen ~ .lolomoRow.jawBoneOpen ~ .lolomoRow,
  .lolomoRow.jawBoneOpen ~ .lolomoRow.bigRowOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 61vw, 0);
    -moz-transform: translate3d(0, 61vw, 0);
    transform: translate3d(0, 61vw, 0);
  }
}
.lolomo {
  overflow-x: hidden;
}
.lolomo.is-fullbleed {
  margin-top: -70px;
}
.slider {
  position: relative;
  margin: 0;
  padding: 0 4%;
  -ms-touch-action: pan-y;
  touch-action: pan-y;
}
@media screen and (min-width: 1500px) {
  .slider {
    padding: 0 60px;
  }
}
.slider .sliderMask {
  overflow-x: hidden;
  padding-bottom: 1px;
}
.slider .sliderMask .sliderContent {
  white-space: nowrap;
}
.slider .sliderMask .sliderContent.animating {
  -webkit-transition: -webkit-transform 0.75s ease 0s;
  transition: -webkit-transform 0.75s ease 0s;
  -o-transition: -o-transform 0.75s ease 0s;
  -moz-transition: transform 0.75s ease 0s, -moz-transform 0.75s ease 0s;
  transition: transform 0.75s ease 0s;
  transition: transform 0.75s ease 0s, -webkit-transform 0.75s ease 0s,
    -moz-transform 0.75s ease 0s, -o-transform 0.75s ease 0s;
  pointer-events: none;
}
.slider .sliderMask .sliderContent .slider-item {
  z-index: 1;
  display: inline-block;
  position: relative;
  white-space: normal;
  vertical-align: top;
}
.slider .sliderMask .sliderContent .slider-item:hover {
  z-index: 2;
}
.slider .sliderMask.showPeek {
  overflow-x: visible;
}
.slider .handle {
  position: absolute;
  top: 0;
  bottom: 0;
  z-index: 20;
  width: 4%;
  text-align: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  color: #fff;
}
@media screen and (min-width: 1500px) {
  .slider .handle {
    width: 60px;
  }
}
.slider .handle.active {
  cursor: pointer;
}
.slider .handle > .indicator-icon {
  display: none;
  height: auto;
  -webkit-align-self: center;
  -ms-flex-item-align: center;
  -ms-grid-row-align: center;
  align-self: center;
  font-size: 2.5vw;
  -webkit-transition: -webkit-transform 0.1s ease-out 0s;
  transition: -webkit-transform 0.1s ease-out 0s;
  -o-transition: -o-transform 0.1s ease-out 0s;
  -moz-transition: transform 0.1s ease-out 0s, -moz-transform 0.1s ease-out 0s;
  transition: transform 0.1s ease-out 0s;
  transition: transform 0.1s ease-out 0s, -webkit-transform 0.1s ease-out 0s,
    -moz-transform 0.1s ease-out 0s, -o-transform 0.1s ease-out 0s;
}
@media screen and (min-width: 1500px) {
  .slider .handle > .indicator-icon {
    font-size: 2em;
  }
}
.slider .handle.handlePrev {
  left: 0;
}
.slider .handle.handlePrev .indicator-icon {
  -webkit-transform-origin: 55% 50%;
  -moz-transform-origin: 55% 50%;
  -ms-transform-origin: 55% 50%;
  -o-transform-origin: 55% 50%;
  transform-origin: 55% 50%;
}
.slider .handle.handleNext {
  right: 0;
}
.slider .handle.handleNext .indicator-icon {
  -webkit-transform-origin: 45% 50%;
  -moz-transform-origin: 45% 50%;
  -ms-transform-origin: 45% 50%;
  -o-transform-origin: 45% 50%;
  transform-origin: 45% 50%;
}
.slider .sliderContent:not(.animating) .sliderItemHidden {
  display: none;
}
.slider-hover-trigger-layer:hover .slider .handle.active .indicator-icon {
  display: block;
}
.slider-hover-trigger-layer:hover .slider .handle.active:hover .indicator-icon {
  font-weight: 700;
  -webkit-transform: scale(1.25);
  -moz-transform: scale(1.25);
  -ms-transform: scale(1.25);
  -o-transform: scale(1.25);
  transform: scale(1.25);
  color: #fff;
}
.slider-hover-trigger-layer .slider .handle.active:focus .indicator-icon {
  display: block;
}
.slider-hover-trigger-layer .slider .handle.active:focus .indicator-icon {
  font-weight: 700;
  -webkit-transform: scale(1.25);
  -moz-transform: scale(1.25);
  -ms-transform: scale(1.25);
  -o-transform: scale(1.25);
  transform: scale(1.25);
  color: #fff;
}
.slider .handle:focus {
  outline: 0;
}
.slider .handle:focus .indicator-icon {
  font-weight: 700;
  -webkit-transform: scale(1.25);
  -moz-transform: scale(1.25);
  -ms-transform: scale(1.25);
  -o-transform: scale(1.25);
  transform: scale(1.25);
  color: #fff;
}
@-webkit-keyframes pulsateAnimation {
  from {
    background-color: #1a1a1a;
  }
  25% {
    background-color: #333;
  }
  50% {
    background-color: #1a1a1a;
  }
  to {
    background-color: #1a1a1a;
  }
}
@-moz-keyframes pulsateAnimation {
  from {
    background-color: #1a1a1a;
  }
  25% {
    background-color: #333;
  }
  50% {
    background-color: #1a1a1a;
  }
  to {
    background-color: #1a1a1a;
  }
}
@-o-keyframes pulsateAnimation {
  from {
    background-color: #1a1a1a;
  }
  25% {
    background-color: #333;
  }
  50% {
    background-color: #1a1a1a;
  }
  to {
    background-color: #1a1a1a;
  }
}
@keyframes pulsateAnimation {
  from {
    background-color: #1a1a1a;
  }
  25% {
    background-color: #333;
  }
  50% {
    background-color: #1a1a1a;
  }
  to {
    background-color: #1a1a1a;
  }
}
@-webkit-keyframes pulsateTransparentAnimation {
  from {
    background-color: transparent;
  }
  25% {
    background-color: #333;
  }
  50% {
    background-color: transparent;
  }
  to {
    background-color: transparent;
  }
}
@-moz-keyframes pulsateTransparentAnimation {
  from {
    background-color: transparent;
  }
  25% {
    background-color: #333;
  }
  50% {
    background-color: transparent;
  }
  to {
    background-color: transparent;
  }
}
@-o-keyframes pulsateTransparentAnimation {
  from {
    background-color: transparent;
  }
  25% {
    background-color: #333;
  }
  50% {
    background-color: transparent;
  }
  to {
    background-color: transparent;
  }
}
@keyframes pulsateTransparentAnimation {
  from {
    background-color: transparent;
  }
  25% {
    background-color: #333;
  }
  50% {
    background-color: transparent;
  }
  to {
    background-color: transparent;
  }
}
.pulsate,
.pulsate-transparent {
  -webkit-animation-duration: 3.6s;
  -moz-animation-duration: 3.6s;
  -o-animation-duration: 3.6s;
  animation-duration: 3.6s;
  -webkit-animation-name: pulsateAnimation;
  -moz-animation-name: pulsateAnimation;
  -o-animation-name: pulsateAnimation;
  animation-name: pulsateAnimation;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  -o-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: ease-in-out;
  -moz-animation-timing-function: ease-in-out;
  -o-animation-timing-function: ease-in-out;
  animation-timing-function: ease-in-out;
}
.pulsate-transparent {
  -webkit-animation-name: pulsateTransparentAnimation;
  -moz-animation-name: pulsateTransparentAnimation;
  -o-animation-name: pulsateTransparentAnimation;
  animation-name: pulsateTransparentAnimation;
}
.no-pulsate {
  background-color: #333;
}
.pulsateTransition-enter {
  -webkit-transition-duration: 0.2s;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -webkit-transition-property: opacity;
  -o-transition-property: opacity;
  -moz-transition-property: opacity;
  transition-property: opacity;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
  z-index: 10000;
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}
.pulsateTransition-enter.pulsateTransition-enter-active {
  opacity: 1;
}
.pulsateTransition-leave {
  -webkit-transition-duration: 0.5s;
  -moz-transition-duration: 0.5s;
  -o-transition-duration: 0.5s;
  transition-duration: 0.5s;
  -webkit-transition-property: opacity;
  -o-transition-property: opacity;
  -moz-transition-property: opacity;
  transition-property: opacity;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
  opacity: 1;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}
.pulsateTransition-leave.pulsateTransition-leave-active {
  opacity: 0;
}
.notification-pill {
  background-color: #b9090b;
  border: none;
  color: #fff;
  display: inline-block;
  font-size: 0.75em;
  font-weight: 700;
  min-width: 1em;
  line-height: 1;
  padding: 0.3em;
  text-align: center;
  -webkit-border-radius: 1000px;
  -moz-border-radius: 1000px;
  border-radius: 1000px;
}
.pinning-header .tabbed-primary-navigation {
  margin: 0;
  padding: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  height: 100%;
}
.pinning-header .tabbed-primary-navigation .navigation-menu,
.pinning-header .tabbed-primary-navigation .navigation-tab {
  list-style-type: none;
  margin-left: 18px;
  height: 100%;
}
@media screen and (min-width: 1330px) {
  .pinning-header .tabbed-primary-navigation .navigation-menu,
  .pinning-header .tabbed-primary-navigation .navigation-tab {
    margin-left: 20px;
  }
}
.pinning-header .tabbed-primary-navigation .navigation-menu .menu-trigger {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  font-weight: 700;
  height: 100%;
}
.pinning-header
  .tabbed-primary-navigation
  .navigation-menu
  .menu-trigger:after {
  content: "";
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 5px 5px 0 5px;
  border-color: #fff transparent transparent transparent;
  margin-left: 5px;
}
.pinning-header .tabbed-primary-navigation .navigation-menu .sub-menu {
  margin-left: -90px;
}
.pinning-header
  .tabbed-primary-navigation
  .navigation-menu
  .sub-menu
  .callout-arrow {
  position: absolute;
  top: -16px;
  left: 50%;
  border-width: 7px;
  margin-left: -7px;
  border-color: transparent transparent #e5e5e5;
  border-style: solid;
  height: 0;
  width: 0;
}
.pinning-header
  .tabbed-primary-navigation
  .navigation-menu
  .sub-menu
  .sub-menu-list {
  padding: 0;
}
.pinning-header
  .tabbed-primary-navigation
  .navigation-menu
  .sub-menu
  .sub-menu-item
  a {
  width: 260px;
  height: 50px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  position: relative;
  color: #b3b3b3;
  -webkit-transition: background-color 0.4s;
  -o-transition: background-color 0.4s;
  -moz-transition: background-color 0.4s;
  transition: background-color 0.4s;
}
.pinning-header
  .tabbed-primary-navigation
  .navigation-menu
  .sub-menu
  .sub-menu-item
  a.current {
  color: #fff;
  font-weight: 700;
  cursor: default;
}
.pinning-header
  .tabbed-primary-navigation
  .navigation-menu
  .sub-menu
  .sub-menu-item
  a.current,
.pinning-header
  .tabbed-primary-navigation
  .navigation-menu
  .sub-menu
  .sub-menu-item
  a:hover {
  background-color: rgba(255, 255, 255, 0.05);
}
.pinning-header .tabbed-primary-navigation .navigation-tab {
  display: none;
}
.pinning-header .tabbed-primary-navigation .navigation-tab a {
  position: relative;
  color: #e5e5e5;
  -webkit-transition: color 0.4s;
  -o-transition: color 0.4s;
  -moz-transition: color 0.4s;
  transition: color 0.4s;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  height: 100%;
}
.pinning-header .tabbed-primary-navigation .navigation-tab a.current {
  color: #fff;
  font-weight: 700;
  cursor: default;
}
.pinning-header .tabbed-primary-navigation .navigation-tab a.current:hover {
  color: #fff;
}
.pinning-header .tabbed-primary-navigation .navigation-tab a:hover {
  color: #b3b3b3;
}
@media screen and (min-width: 885px) {
  .pinning-header
    .tabbed-primary-navigation:not(.has-dropdown-menu)
    .navigation-tab {
    display: block;
  }
  .pinning-header
    .tabbed-primary-navigation:not(.has-dropdown-menu)
    .navigation-menu {
    display: none;
  }
}
.searchBox {
  display: inline-block;
  vertical-align: middle;
}
@media screen and (max-width: 400px) {
  .searchBox {
    display: none;
  }
}
.searchInput {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background: rgba(0, 0, 0, 0.75);
  border: solid 1px rgba(255, 255, 255, 0.85);
}
.searchInput input {
  color: #fff;
  display: inline-block;
  background: 0 0;
  border: none;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 7px 14px 7px 7px;
  font-size: 14px;
  width: 212px;
  outline: 0;
}
.searchInput input:focus {
  outline: 0;
}
.searchInput input::-webkit-input-placeholder {
  color: #999;
  font-weight: 400;
  font-size: 14px;
  opacity: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.searchInput input::-moz-placeholder {
  color: #999;
  font-weight: 400;
  font-size: 14px;
  opacity: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.searchInput input:-ms-input-placeholder {
  color: #999;
  font-weight: 400;
  font-size: 14px;
  opacity: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.searchInput input::-ms-clear {
  display: none;
}
.searchInput .icon-search {
  padding: 0 6px;
}
.searchInput .icon-close {
  cursor: pointer;
  margin: 0 6px;
  font-size: 13px;
}
.searchInput .empty {
  visibility: hidden;
}
.searchTab {
  display: inline-block;
  cursor: pointer;
  border: none;
  background: 0 0;
}
.searchTab span {
  line-height: 1;
  color: #fff;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
}
.searchTab .icon-search {
  font-size: 12px;
  font-weight: 700;
  margin-right: 10px;
}
.searchTab .label {
  left: 20px;
}
.akira-header .account-menu-item,
.pinning-header .account-menu-item {
  display: block;
  position: relative;
  font-size: 12px;
  z-index: 0;
}
.akira-header .account-menu-item .kids-badge,
.pinning-header .account-menu-item .kids-badge {
  display: none;
}
.akira-header .account-menu-item .avatar-wrapper,
.pinning-header .account-menu-item .avatar-wrapper {
  display: inline;
}
.akira-header .account-menu-item.exit-button,
.pinning-header .account-menu-item.exit-button {
  border: 1px solid #ccc;
  padding: 3px;
}
.akira-header
  .account-menu-item.exit-button
  .account-dropdown-button
  .profile-name,
.pinning-header
  .account-menu-item.exit-button
  .account-dropdown-button
  .profile-name {
  max-width: 140px;
}
.akira-header .account-menu-item.exit-button-red,
.pinning-header .account-menu-item.exit-button-red {
  border: none;
  padding: 3px;
  background: #df242c;
}
.akira-header
  .account-menu-item.exit-button-red
  .account-dropdown-button
  .profile-icon,
.pinning-header
  .account-menu-item.exit-button-red
  .account-dropdown-button
  .profile-icon {
  border: 1px solid #fff;
}
.akira-header
  .account-menu-item.exit-button-red
  .account-dropdown-button
  .profile-name,
.pinning-header
  .account-menu-item.exit-button-red
  .account-dropdown-button
  .profile-name {
  color: #fff;
}
.akira-header
  .account-menu-item.exit-button-red
  .account-dropdown-button
  .caret,
.pinning-header
  .account-menu-item.exit-button-red
  .account-dropdown-button
  .caret {
  border-color: #fff transparent transparent transparent;
}
.akira-header .account-dropdown-button,
.pinning-header .account-dropdown-button {
  width: 100%;
  cursor: pointer;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
@media screen and (max-width: 950px) {
  .akira-header .account-dropdown-button,
  .pinning-header .account-dropdown-button {
    height: 40px;
  }
}
.akira-header .account-dropdown-button a,
.pinning-header .account-dropdown-button a {
  z-index: -1;
  position: relative;
}
.akira-header .account-dropdown-button .caret,
.pinning-header .account-dropdown-button .caret {
  margin-left: 10px;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 5px 5px 0 5px;
  border-color: #fff transparent transparent transparent;
}
@media screen and (max-width: 950px) {
  .akira-header .account-dropdown-button .caret,
  .pinning-header .account-dropdown-button .caret {
    display: none;
  }
}
.akira-header .account-dropdown-button .avatar-wrapper,
.pinning-header .account-dropdown-button .avatar-wrapper {
  position: relative;
}
.akira-header .account-dropdown-button .profile-icon,
.pinning-header .account-dropdown-button .profile-icon {
  vertical-align: middle;
  height: 32px;
  width: 32px;
}
@media screen and (max-width: 950px) {
  .akira-header .account-dropdown-button .profile-icon,
  .pinning-header .account-dropdown-button .profile-icon {
    width: 40px;
    height: 40px;
  }
}
.akira-header .account-dropdown-button .profile-link,
.pinning-header .account-dropdown-button .profile-link {
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.akira-header .account-dropdown-button .profile-name,
.pinning-header .account-dropdown-button .profile-name {
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  margin-left: 6px;
  font-weight: 700;
  max-width: 80px;
  white-space: pre;
}
@media screen and (max-width: 950px) {
  .akira-header .account-dropdown-button .profile-name,
  .pinning-header .account-dropdown-button .profile-name {
    display: none;
  }
}
.akira-header .account-dropdown-button .callout-arrow,
.pinning-header .account-dropdown-button .callout-arrow {
  position: absolute;
  bottom: -19px;
  left: 50%;
  border-width: 7px;
  margin-left: -7px;
  border-color: transparent transparent #e5e5e5;
  border-style: solid;
  height: 0;
  width: 0;
}
.akira-header .account-dropdown-button.direction-top .callout-arrow,
.pinning-header .account-dropdown-button.direction-top .callout-arrow {
  border-color: #e5e5e5 transparent transparent;
  bottom: auto;
  top: -20px;
}
.akira-header .account-drop-down,
.pinning-header .account-drop-down {
  position: absolute;
  right: 0;
  top: 52px;
  width: 166px;
  margin-left: 0;
  padding: 0;
}
@media screen and (max-width: 950px) {
  .akira-header .account-drop-down,
  .pinning-header .account-drop-down {
    top: 59px;
  }
}
.akira-header .account-drop-down.sub-menu-top,
.pinning-header .account-drop-down.sub-menu-top {
  top: auto;
  bottom: 52px;
}
@media screen and (max-width: 950px) {
  .akira-header .account-drop-down.sub-menu-top,
  .pinning-header .account-drop-down.sub-menu-top {
    top: auto;
    bottom: 59px;
  }
}
.akira-header .account-drop-down .sub-menu-list,
.pinning-header .account-drop-down .sub-menu-list {
  display: block;
  width: 100%;
  padding: 0;
  margin: 0;
  height: auto;
}
.akira-header .account-drop-down .sub-menu-item,
.pinning-header .account-drop-down .sub-menu-item {
  padding: 5px 10px;
  display: block;
  font-size: 13px;
  line-height: 1.2;
}
.akira-header .account-drop-down .sub-menu-item > a,
.pinning-header .account-drop-down .sub-menu-item > a {
  text-transform: none;
  display: inline-block;
  width: 100%;
}
.akira-header .account-drop-down .sub-menu-item > a:hover,
.pinning-header .account-drop-down .sub-menu-item > a:hover {
  text-decoration: underline;
}
.akira-header .account-drop-down .profiles,
.pinning-header .account-drop-down .profiles {
  height: auto;
  padding: 10px 0 5px 0;
  overflow: hidden;
}
.akira-header .account-drop-down .profiles .sub-menu-item,
.pinning-header .account-drop-down .profiles .sub-menu-item {
  line-height: 32px;
}
.akira-header .account-drop-down .profiles .profile-link,
.pinning-header .account-drop-down .profiles .profile-link {
  cursor: pointer;
}
.akira-header .account-drop-down .profiles .profile-icon,
.pinning-header .account-drop-down .profiles .profile-icon {
  margin-right: 10px;
  vertical-align: middle;
  height: 32px;
  width: 32px;
}
.akira-header .account-drop-down .profiles .profile-name,
.pinning-header .account-drop-down .profiles .profile-name {
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  width: 100px;
  line-height: 18px;
  vertical-align: middle;
  display: inline-block;
  white-space: pre;
}
@media screen and (max-width: 950px) {
  .akira-header .account-drop-down .profiles .profile-name,
  .pinning-header .account-drop-down .profiles .profile-name {
    display: inline-block;
  }
}
.akira-header .account-drop-down .profiles .profile-link:hover .profile-name,
.pinning-header .account-drop-down .profiles .profile-link:hover .profile-name {
  text-decoration: underline;
}
.akira-header .account-drop-down .account-links,
.pinning-header .account-drop-down .account-links {
  padding: 10px 0;
  border-top: solid 1px rgba(255, 255, 255, 0.25);
}
.akira-header .account-drop-down .account-links .sub-menu-link,
.pinning-header .account-drop-down .account-links .sub-menu-link {
  font-weight: 700;
}
.akira-header .account-drop-down .responsive-links,
.pinning-header .account-drop-down .responsive-links {
  display: none;
  padding: 10px 0;
  border-top: solid 1px rgba(255, 255, 255, 0.25);
}
@media screen and (max-width: 860px) {
  .akira-header .account-drop-down .responsive-links,
  .pinning-header .account-drop-down .responsive-links {
    display: block;
  }
}
.akira-header .account-drop-down .responsive-links .dvd-link,
.pinning-header .account-drop-down .responsive-links .dvd-link {
  display: none;
}
@media screen and (max-width: 860px) {
  .akira-header .account-drop-down .responsive-links .dvd-link,
  .pinning-header .account-drop-down .responsive-links .dvd-link {
    display: block;
  }
}
.akira-header .account-drop-down .responsive-links .kids-responsive-link,
.pinning-header .account-drop-down .responsive-links .kids-responsive-link {
  display: none;
}
@media screen and (max-width: 650px) {
  .akira-header .account-drop-down .responsive-links .kids-responsive-link,
  .pinning-header .account-drop-down .responsive-links .kids-responsive-link {
    display: block;
  }
}
@media screen and (max-width: 860px) {
  .akira-header.search-focused
    .account-menu-item
    .responsive-links
    .kids-responsive-link {
    display: block;
  }
}
.pinning-header .secondary-navigation {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  position: absolute;
  right: 4%;
  top: 0;
  height: 100%;
}
@media screen and (min-width: 1500px) {
  .pinning-header .secondary-navigation {
    right: 60px;
  }
}
.pinning-header .secondary-navigation .nav-element:not(:last-child) {
  margin-right: 15px;
}
@media screen and (min-width: 1330px) {
  .pinning-header .secondary-navigation .nav-element:not(:last-child) {
    margin-right: 20px;
  }
}
.pinning-header .secondary-navigation .icon-search {
  vertical-align: middle;
}
.pinning-header .secondary-navigation .notifications {
  position: relative;
}
.pinning-header .secondary-navigation .notifications .sub-menu {
  top: 34px;
}
@media screen and (min-width: 1150px) {
  .pinning-header .secondary-navigation .notifications .sub-menu {
    top: 38px;
  }
}
.pinning-header .secondary-navigation .show-dvd,
.pinning-header .secondary-navigation .show-kids {
  display: none;
}
.pinning-header .secondary-navigation.menu-navigation {
  font-size: 16px;
}
.pinning-header .secondary-navigation:not(.menu-navigation) .icon-search {
  font-size: 1.3em;
  margin-right: 0;
}
.pinning-header
  .secondary-navigation:not(.menu-navigation).search-focused
  .searchBox {
  margin-left: 100px;
}
@media screen and (min-width: 1100px) {
  .pinning-header .secondary-navigation:not(.menu-navigation) .show-dvd,
  .pinning-header .secondary-navigation:not(.menu-navigation) .show-kids {
    display: block;
  }
  .pinning-header
    .secondary-navigation:not(.menu-navigation)
    .account-drop-down
    .responsive-links {
    display: none;
  }
}
@media screen and (max-width: 1100px) {
  .pinning-header
    .secondary-navigation:not(.menu-navigation)
    .account-drop-down
    .responsive-links {
    display: block;
  }
  .pinning-header .secondary-navigation:not(.menu-navigation) .dvd-link,
  .pinning-header
    .secondary-navigation:not(.menu-navigation)
    .kids-responsive-link {
    display: block;
  }
}
.pinning-header .main-header {
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  padding: 0 4%;
  z-index: 2;
  font-size: 1.2rem;
  -webkit-transition: background-color 0.4s;
  -o-transition: background-color 0.4s;
  -moz-transition: background-color 0.4s;
  transition: background-color 0.4s;
}
@media screen and (min-width: 1200px) {
  .pinning-header .main-header {
    font-size: 14px;
  }
}
@media screen and (min-width: 1500px) {
  .pinning-header .main-header {
    padding: 0 60px;
  }
}
.pinning-header .main-header.solid {
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}
.pinning-header .main-header.has-billboard {
  background-color: transparent;
}
.pinning-header .main-header.on-profiles-gate:not(.solid) {
  background-color: transparent;
}
.pinning-header .main-header.menu-navigation {
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    color-stop(10%, rgba(0, 0, 0, 0.7)),
    color-stop(10%, rgba(0, 0, 0, 0))
  );
  background-image: -webkit-linear-gradient(
    top,
    rgba(0, 0, 0, 0.7) 10%,
    rgba(0, 0, 0, 0)
  );
  background-image: -moz-linear-gradient(
    top,
    rgba(0, 0, 0, 0.7) 10%,
    rgba(0, 0, 0, 0)
  );
  background-image: -o-linear-gradient(
    top,
    rgba(0, 0, 0, 0.7) 10%,
    rgba(0, 0, 0, 0)
  );
  background-image: linear-gradient(
    to bottom,
    rgba(0, 0, 0, 0.7) 10%,
    rgba(0, 0, 0, 0)
  );
}
.pinning-header .main-header.menu-navigation.has-billboard:not(.solid) {
  background-color: transparent;
}
.pinning-header .main-header.menu-navigation:not(.has-billboard):not(.solid) {
  background-color: #141414;
}
@media screen and (max-width: 800px) {
  .pinning-header
    .main-header.menu-navigation.search-focused
    .genre-menu-primary-navigation {
    display: none;
  }
}
.pinning-header .main-header .logo {
  text-decoration: none;
  font-size: 1.8em;
  color: #e50914;
  display: inline-block;
  vertical-align: middle;
  cursor: pointer;
  margin-right: 5px;
}
@media screen and (min-width: 950px) {
  .pinning-header .main-header .logo {
    font-size: 25px;
  }
}
@media screen and (min-width: 1150px) {
  .pinning-header .main-header .logo {
    margin-right: 25px;
  }
}
.pinning-header .main-header .sign-out {
  font-weight: 700;
  position: absolute;
  right: 4%;
  font-size: 1.2em;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  height: 100%;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.pinning-header .sub-header {
  position: relative;
  height: 4rem;
}
.pinning-header .sub-header .sub-header-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  height: 4rem;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  padding: 0 4%;
}
@media screen and (min-width: 1500px) {
  .pinning-header .sub-header .sub-header-wrapper {
    padding: 0 60px;
  }
}
.pinning-header .sub-header .aro-gallery-header,
.pinning-header .sub-header .galleryHeader {
  margin: 0;
  min-height: 0;
  padding: 0;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
.pinning-header .sub-header .title {
  font-size: 2.5rem;
}
.pinning-header .sub-header .sort-gallery-sub-header {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.pinning-header .sub-header .sort-gallery-sub-header .title {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
.mainView .aro-genre .lolomo,
.mainView .aro-genre-loading {
  padding-top: 5rem;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
@media screen and (max-width: 499px) {
  .mainView .aro-genre .lolomo,
  .mainView .aro-genre-loading {
    margin-top: 5%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .mainView .aro-genre .lolomo,
  .mainView .aro-genre-loading {
    margin-top: 3.3333333%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .mainView .aro-genre .lolomo,
  .mainView .aro-genre-loading {
    margin-top: 2.5%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .mainView .aro-genre .lolomo,
  .mainView .aro-genre-loading {
    margin-top: 2%;
  }
}
@media screen and (min-width: 1400px) {
  .mainView .aro-genre .lolomo,
  .mainView .aro-genre-loading {
    margin-top: 1.66666667%;
  }
}
.mainView .aro-genre .lolomo .lolomoRow:first-child,
.mainView .aro-genre-loading .lolomoRow:first-child {
  margin-top: 0;
}
.mainView .aro-genre .lolomo.is-fullbleed,
.mainView .aro-genre-loading.is-fullbleed {
  padding-top: 0;
  margin-top: -70px;
}
.mainView .gallery,
.mainView .rowListContainer {
  padding-top: 5rem;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
@media screen and (max-width: 499px) {
  .mainView .gallery,
  .mainView .rowListContainer {
    margin-top: 10.5%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .mainView .gallery,
  .mainView .rowListContainer {
    margin-top: 6.99999993%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .mainView .gallery,
  .mainView .rowListContainer {
    margin-top: 5.25%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .mainView .gallery,
  .mainView .rowListContainer {
    margin-top: 4.2%;
  }
}
@media screen and (min-width: 1400px) {
  .mainView .gallery,
  .mainView .rowListContainer {
    margin-top: 3.5%;
  }
}
.search .gallery {
  margin-top: 0;
  padding-top: 0;
}
.pinning-header {
  height: 70px;
}
.pinning-header.hide {
  opacity: 0;
  pointer-events: none;
}
.pinning-header .pinning-header-container {
  left: 0;
  right: 0;
  top: 0;
  position: relative;
  z-index: 1;
}
.pinning-header .pinning-header-container .main-header {
  z-index: 2;
  height: 41px;
}
@media screen and (min-width: 950px) {
  .pinning-header .pinning-header-container .main-header {
    height: 68px;
  }
}
.pinning-header .pinning-header-container .sub-header {
  z-index: 1;
}
.pinning-header .subheader-shadow {
  height: 1rem;
  position: absolute;
  z-index: 2;
  width: 100%;
}
@-webkit-keyframes simpleNotificationAnimation {
  0% {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@-moz-keyframes simpleNotificationAnimation {
  0% {
    opacity: 0;
    -moz-transform: scale(0);
    transform: scale(0);
  }
  100% {
    opacity: 1;
    -moz-transform: scale(1);
    transform: scale(1);
  }
}
@-o-keyframes simpleNotificationAnimation {
  0% {
    opacity: 0;
    -o-transform: scale(0);
    transform: scale(0);
  }
  100% {
    opacity: 1;
    -o-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes simpleNotificationAnimation {
  0% {
    opacity: 0;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -o-transform: scale(0);
    transform: scale(0);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
  }
}
.simple-notification {
  position: absolute;
  top: 70px;
  left: 0;
  width: 100%;
  text-align: center;
}
.simple-notification p {
  padding: 0.3em 0.8em 0.5em;
  margin: 0;
  display: inline-block;
}
.simple-notification.success p {
  background: #65b539;
}
.simple-notification.warning p {
  background: #eab000;
}
.simple-notification.error p {
  background: #eab000;
}
.simple-notification.info p {
  background: #007cff;
}
.simple-notification span {
  display: inline-block;
  vertical-align: middle;
}
.simple-notification.animated {
  -webkit-animation-duration: 0.33s;
  -moz-animation-duration: 0.33s;
  -o-animation-duration: 0.33s;
  animation-duration: 0.33s;
  -webkit-animation-name: simpleNotificationAnimation;
  -moz-animation-name: simpleNotificationAnimation;
  -o-animation-name: simpleNotificationAnimation;
  animation-name: simpleNotificationAnimation;
  -webkit-animation-iteration-count: 1;
  -moz-animation-iteration-count: 1;
  -o-animation-iteration-count: 1;
  animation-iteration-count: 1;
  -webkit-animation-timing-function: ease-in-out;
  -moz-animation-timing-function: ease-in-out;
  -o-animation-timing-function: ease-in-out;
  animation-timing-function: ease-in-out;
}
.simple-notification-message {
  font-weight: 700;
  margin: 0 0 0 0.5em;
}
.gallery {
  margin: 0;
  overflow: hidden;
  min-height: 1000px;
}
.gallery.has-open-jaw {
  padding: 0 0 37vw;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .gallery.has-open-jaw {
    padding: 0 0 42vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .gallery.has-open-jaw {
    padding: 0 0 37vw;
  }
}
@media screen and (min-width: 1400px) {
  .gallery.has-open-jaw {
    padding: 0 0 32vw;
  }
}
.gallery.has-open-bigRow {
  padding: 0 0 29vw;
}
@media screen and (max-width: 499px) {
  .gallery.has-open-bigRow {
    padding: 0 0 7vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .gallery.has-open-bigRow {
    padding: 0 0 21vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .gallery.has-open-bigRow {
    padding: 0 0 25vw;
  }
}
@media screen and (max-width: 499px) {
  .gallery.has-open-jaw.has-open-bigRow {
    padding: 0 0 44vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .gallery.has-open-jaw.has-open-bigRow {
    padding: 0 0 58vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .gallery.has-open-jaw.has-open-bigRow {
    padding: 0 0 67vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .gallery.has-open-jaw.has-open-bigRow {
    padding: 0 0 66vw;
  }
}
@media screen and (min-width: 1400px) {
  .gallery.has-open-jaw.has-open-bigRow {
    padding: 0 0 61vw;
  }
}
.gallery.search {
  padding-top: 3%;
}
.gallery .galleryHeader {
  padding: 36px 0 72px 0;
  min-height: 44px;
  margin: 0 4%;
}
@media screen and (min-width: 1500px) {
  .gallery .galleryHeader {
    margin: 0 60px;
  }
}
.gallery .personHeader {
  padding: 36px 0 36px 0;
  min-height: 44px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin: 0 4%;
}
@media screen and (min-width: 1500px) {
  .gallery .personHeader {
    margin: 0 60px;
  }
}
.gallery .galleryContent {
  position: relative;
  z-index: 0;
}
.gallery .title {
  font-size: 36px;
}
.gallery .galleryMessage {
  color: #666;
  text-align: center;
  padding-top: 100px;
  font-size: 18px;
}
.gallery .gallerySpinLoader {
  text-align: center;
}
.gallery .galleryOptions {
  float: right;
  line-height: 44px;
  font-size: 14px;
}
.gallery .galleryOptions .changeOrderLink {
  border: 1px solid #333;
  padding: 10px 15px;
  color: #fff;
  background-color: #000;
  margin-left: 5px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
}
.gallery .galleryOptions .changeOrderLink:hover {
  border-color: grey;
}
.gallery .rowContainer {
  margin: 0 0 48px 0;
  margin-bottom: 4vw;
}
@media screen and (max-width: 499px) {
  .gallery .rowContainer {
    margin-bottom: 7.5vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .gallery .rowContainer {
    margin-bottom: 7.5vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .gallery .rowContainer {
    margin-bottom: 5.5vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .gallery .rowContainer {
    margin-bottom: 4.5vw;
  }
}
@media screen and (min-width: 1400px) {
  .gallery .rowContainer {
    margin-bottom: 4vw;
  }
}
.gallery .rowContainer:hover {
  z-index: 1;
}
@-webkit-keyframes popInAnimation {
  from {
    opacity: 0;
    -webkit-transform: scale(0.97);
    transform: scale(0.97);
  }
  to {
    opacity: 0.99;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@-moz-keyframes popInAnimation {
  from {
    opacity: 0;
    -moz-transform: scale(0.97);
    transform: scale(0.97);
  }
  to {
    opacity: 0.99;
    -moz-transform: scale(1);
    transform: scale(1);
  }
}
@-o-keyframes popInAnimation {
  from {
    opacity: 0;
    -o-transform: scale(0.97);
    transform: scale(0.97);
  }
  to {
    opacity: 0.99;
    -o-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes popInAnimation {
  from {
    opacity: 0;
    -webkit-transform: scale(0.97);
    -moz-transform: scale(0.97);
    -o-transform: scale(0.97);
    transform: scale(0.97);
  }
  to {
    opacity: 0.99;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
  }
}
.animate-in {
  opacity: 0;
  -webkit-animation-duration: 0.8s;
  -moz-animation-duration: 0.8s;
  -o-animation-duration: 0.8s;
  animation-duration: 0.8s;
  -webkit-animation-name: popInAnimation;
  -moz-animation-name: popInAnimation;
  -o-animation-name: popInAnimation;
  animation-name: popInAnimation;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-timing-function: cubic-bezier(0, 0, 0.5, 1);
  -moz-animation-timing-function: cubic-bezier(0, 0, 0.5, 1);
  -o-animation-timing-function: cubic-bezier(0, 0, 0.5, 1);
  animation-timing-function: cubic-bezier(0, 0, 0.5, 1);
}
.headshot {
  vertical-align: top;
  padding-right: 10px;
}
.galleryLoader {
  padding: 0 4%;
}
@media screen and (min-width: 1500px) {
  .galleryLoader {
    padding: 0 60px;
  }
}
.categoryDropDown,
.languageDropDown {
  display: inline-block;
  vertical-align: top;
  margin: 0 10px;
}
.languageDropDown .nfDropDown.theme-lakira {
  min-width: 240px;
}
.loadingTitle {
  display: inline-block;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.loadingTitle.fullWidth {
  width: 100%;
}
.loadingTitle .ratio-16x9 {
  padding: 27.25% 0;
}
@media screen and (max-width: 499px) {
  .loadingTitle {
    width: 50%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .loadingTitle {
    width: 33.333333%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .loadingTitle {
    width: 25%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .loadingTitle {
    width: 20%;
  }
}
@media screen and (min-width: 1400px) {
  .loadingTitle {
    width: 16.66666667%;
  }
}
.lolomo {
  padding: 0 0 50px;
  z-index: 0;
  overflow: hidden;
}
.lolomo.has-open-jaw {
  padding: 0 0 37vw;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .lolomo.has-open-jaw {
    padding: 0 0 42vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .lolomo.has-open-jaw {
    padding: 0 0 37vw;
  }
}
@media screen and (min-width: 1400px) {
  .lolomo.has-open-jaw {
    padding: 0 0 32vw;
  }
}
.lolomo.has-open-bigRow {
  padding: 0 0 29vw;
}
@media screen and (max-width: 499px) {
  .lolomo.has-open-bigRow {
    padding: 0 0 7vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .lolomo.has-open-bigRow {
    padding: 0 0 21vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .lolomo.has-open-bigRow {
    padding: 0 0 25vw;
  }
}
@media screen and (max-width: 499px) {
  .lolomo.has-open-jaw.has-open-bigRow {
    padding: 0 0 44vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .lolomo.has-open-jaw.has-open-bigRow {
    padding: 0 0 58vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .lolomo.has-open-jaw.has-open-bigRow {
    padding: 0 0 67vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .lolomo.has-open-jaw.has-open-bigRow {
    padding: 0 0 66vw;
  }
}
@media screen and (min-width: 1400px) {
  .lolomo.has-open-jaw.has-open-bigRow {
    padding: 0 0 61vw;
  }
}
.lolomoSpinLoader {
  text-align: center;
  width: 100%;
  position: absolute;
  top: 47%;
}
.recently-watched-label {
  position: absolute;
  top: 0;
  text-align: center;
  width: 100%;
}
.recently-watched-label a {
  color: #fff;
}
.lolomoRow {
  position: relative;
}
.lolomoRow.lolomoRow_billboard {
  margin: 0;
}
.lolomoRow.lolomoRow_billboard > .slider {
  min-height: 500px;
}
.lolomoRow.lolomoRow_medium_card {
  margin: 0 0 20px 20px;
  position: relative;
}
.lolomoRow.lolomoRow_medium_card .handle {
  top: 40px;
  bottom: 40px;
}
.lolomoRow.lolomoRow_medium_card > .slider {
  min-height: 305px;
  padding: 40px 0;
}
.lolomoRow.lolomoRow_title_card {
  margin: 3vw 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.lolomoRow.lolomoRow_title_card:hover {
  z-index: 3;
}
.lolomoRow.lolomoPreview .rowContent {
  overflow: hidden;
  white-space: nowrap;
}
.lolomoRow.lolomoPreview .loadingTitle {
  border-right: 2px solid #141414;
  border-left: 2px solid #141414;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: inline-block;
}
.lolomoRow .pagination-indicator {
  margin: -24px 0 12px 0;
  padding: 0;
  list-style-type: none;
  position: absolute;
  top: 0;
  right: 4%;
  display: none;
}
@media screen and (min-width: 1500px) {
  .lolomoRow .pagination-indicator {
    right: 62px;
  }
}
.lolomoRow .pagination-indicator li {
  display: inline-block;
  width: 12px;
  height: 2px;
  background-color: #4d4d4d;
  margin-left: 1px;
}
.lolomoRow .pagination-indicator .active {
  background-color: #aaa;
}
.lolomoRow .slider:hover .pagination-indicator {
  display: block;
}
.lolomoRow.lolomoRow_medium_card .rowTitle {
  position: absolute;
  top: 8px;
}
.lolomoRow.lolomoRow_title_card .rowTitle {
  font-size: 1.4vw;
  color: #e5e5e5;
  font-weight: 700;
  margin: 0 4% 0.5em 4%;
  text-decoration: none;
  display: inline-block;
  min-width: 6em;
}
@media screen and (min-width: 1500px) {
  .lolomoRow.lolomoRow_title_card .rowTitle {
    margin-left: 60px;
  }
}
@media screen and (max-width: 800px) {
  .lolomoRow.lolomoRow_title_card .rowTitle {
    font-size: 12px;
  }
}
.lolomoRow.lolomoRow_title_card .rowTitle .row-header-title {
  display: table-cell;
  vertical-align: bottom;
  line-height: 1.25vw;
  font-size: 1.4vw;
}
@media screen and (max-width: 800px) {
  .lolomoRow.lolomoRow_title_card .rowTitle .row-header-title {
    font-size: 12px;
  }
}
.lolomoRow.lolomoRow_title_card .rowTitle .rowChevron {
  font-size: 0.9vw;
  display: none;
  margin-left: 0.7em;
  font-weight: 700;
}
.lolomoRow.lolomoRow_title_card .rowTitle .aro-row-chevron {
  display: none;
  -webkit-transition: -webkit-transform 750ms;
  transition: -webkit-transform 750ms;
  -o-transition: -o-transform 750ms;
  -moz-transition: transform 750ms, -moz-transform 750ms;
  transition: transform 750ms;
  transition: transform 750ms, -webkit-transform 750ms, -moz-transform 750ms,
    -o-transform 750ms;
  font-size: 0.9vw;
  vertical-align: bottom;
}
.lolomoRow.lolomoRow_title_card .rowTitle .aro-row-header {
  display: table-cell;
  vertical-align: bottom;
}
.lolomoRow.lolomoRow_title_card .rowTitle .aro-row-header .see-all-link {
  display: inline-block;
  font-size: 0.9vw;
  margin-right: 4px;
  max-width: 0;
  line-height: 0.8vw;
  -webkit-transition: max-width 1s, opacity 1s, -webkit-transform 750ms;
  transition: max-width 1s, opacity 1s, -webkit-transform 750ms;
  -o-transition: max-width 1s, opacity 1s, -o-transform 750ms;
  -moz-transition: max-width 1s, opacity 1s, transform 750ms,
    -moz-transform 750ms;
  transition: max-width 1s, opacity 1s, transform 750ms;
  transition: max-width 1s, opacity 1s, transform 750ms, -webkit-transform 750ms,
    -moz-transform 750ms, -o-transform 750ms;
  white-space: nowrap;
  vertical-align: bottom;
  cursor: pointer;
  opacity: 0;
}
@media screen and (max-width: 800px) {
  .lolomoRow.lolomoRow_title_card .rowTitle .aro-row-header .see-all-link {
    font-size: 8px;
  }
}
.lolomoRow.lolomoRow_title_card:hover a.rowTitle:hover {
  color: #fff;
}
.lolomoRow.lolomoRow_title_card:hover
  a.rowTitle:hover
  .aro-row-header
  .see-all-link {
  max-width: 200px;
  -webkit-transform: translate(1vw, 0);
  -moz-transform: translate(1vw, 0);
  -ms-transform: translate(1vw, 0);
  -o-transform: translate(1vw, 0);
  transform: translate(1vw, 0);
  opacity: 1;
}
.lolomoRow.lolomoRow_title_card:hover
  a.rowTitle:hover
  .aro-row-header
  .aro-row-chevron {
  -webkit-transform: translate(1vw, 0);
  -moz-transform: translate(1vw, 0);
  -ms-transform: translate(1vw, 0);
  -o-transform: translate(1vw, 0);
  transform: translate(1vw, 0);
  font-size: 0.65vw;
  line-height: 0.8vw;
}
@media screen and (max-width: 800px) {
  .lolomoRow.lolomoRow_title_card:hover
    a.rowTitle:hover
    .aro-row-header
    .aro-row-chevron {
    font-size: 6px;
  }
}
.lolomoRow.lolomoRow_title_card:hover a.rowTitle .rowChevron {
  display: inline-block;
}
.lolomoRow.lolomoRow_title_card:hover a.rowTitle .aro-row-chevron {
  display: inline-block;
  font-size: 0.9vw;
  vertical-align: bottom;
}
.lolomoRow.lolomoRow_title_card .originals-row-title {
  color: #e5e5e5;
  font-size: 1.2vw;
}
@media screen and (max-width: 800px) {
  .lolomoRow.lolomoRow_title_card .originals-row-title {
    font-size: 12px;
  }
}
.lolomoRow.lolomoPreview .rowTitle {
  background-color: #1a1a1a;
}
.lolomoRow .rowHeader {
  line-height: 1.3;
  margin: 0;
}
.lolomoHeader {
  min-height: 44px;
  padding: 36px 0 24px 60px;
}
.lolomoHeader .title {
  font-size: 36px;
}
.bigRowOpen .bigRow .movable-container,
.bigRowOpen .bigRow .static-image {
  opacity: 0;
}
.bigRowOpen .bigRow .video-component-container {
  height: inherit;
}
.bigRowOpen .bigRow .button-container {
  bottom: 5%;
}
.bigRowOpen .bigRow .playLink {
  opacity: 0;
  pointer-events: none;
}
.bigRowOpen .bigRow .audio-btn {
  opacity: 1;
  pointer-events: all;
}
.bigRow {
  position: relative;
}
@media screen and (max-width: 499px) {
  .bigRow {
    padding: 18% 0;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .bigRow {
    padding: 10.7% 0;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .bigRow {
    padding: 9% 0;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bigRow {
    padding: 7.1% 0;
  }
}
@media screen and (min-width: 1400px) {
  .bigRow {
    padding: 7.1% 0;
  }
}
.bigRow .bigRowItem {
  width: 100%;
  overflow: hidden;
}
.bigRow .title {
  font-size: 2vw;
}
.bigRow .static-image {
  opacity: 1;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  -moz-background-size: 100% auto;
  background-size: 100% auto;
  z-index: 5;
  -webkit-transition: opacity 0.54s cubic-bezier(0.5, 0, 0.1, 1);
  -o-transition: opacity 0.54s cubic-bezier(0.5, 0, 0.1, 1);
  -moz-transition: opacity 0.54s cubic-bezier(0.5, 0, 0.1, 1);
  transition: opacity 0.54s cubic-bezier(0.5, 0, 0.1, 1);
  background-repeat: no-repeat;
}
@media screen and (max-width: 499px) {
  .bigRow .static-image {
    -moz-background-size: 240%;
    background-size: 240%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .bigRow .static-image {
    -moz-background-size: 145%;
    background-size: 145%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .bigRow .static-image {
    -moz-background-size: 130% auto;
    background-size: 130% auto;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bigRow .static-image {
    -moz-background-size: 100% auto;
    background-size: 100% auto;
  }
}
@media screen and (min-width: 1400px) {
  .bigRow .static-image {
    -moz-background-size: 100% auto;
    background-size: 100% auto;
  }
}
.bigRow .metadata {
  position: absolute;
  top: 0;
  margin-top: 1%;
  margin-left: 5%;
  height: 100%;
  width: 95%;
  overflow: hidden;
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bigRow .metadata {
    margin-top: 0.4%;
  }
}
@media screen and (min-width: 1400px) {
  .bigRow .metadata {
    margin-top: 0.4%;
  }
}
.bigRow .movable-container {
  width: 100%;
  position: absolute;
  opacity: 1;
  -webkit-transition: opacity 0.54s cubic-bezier(0.5, 0, 0.1, 1);
  -o-transition: opacity 0.54s cubic-bezier(0.5, 0, 0.1, 1);
  -moz-transition: opacity 0.54s cubic-bezier(0.5, 0, 0.1, 1);
  transition: opacity 0.54s cubic-bezier(0.5, 0, 0.1, 1);
  z-index: 5;
}
@media screen and (max-width: 499px) {
  .bigRow .title-logo {
    width: 68%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .bigRow .title-logo {
    width: 36%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .bigRow .title-logo {
    width: 28%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bigRow .title-logo {
    width: 22%;
  }
}
@media screen and (min-width: 1400px) {
  .bigRow .title-logo {
    width: 22%;
  }
}
.bigRow .accolades {
  float: right;
  margin-top: 2%;
  width: 40%;
  position: relative;
  visibility: hidden;
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bigRow .accolades {
    visibility: visible;
  }
}
@media screen and (min-width: 1400px) {
  .bigRow .accolades {
    visibility: visible;
  }
}
.bigRow .video-component-container {
  -webkit-transition: opacity 1s ease-out, height 1s ease-out;
  -o-transition: opacity 1s ease-out, height 1s ease-out;
  -moz-transition: opacity 1s ease-out, height 1s ease-out;
  transition: opacity 1s ease-out, height 1s ease-out;
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
  min-height: 100%;
}
.bigRow .nfp.nf-player-container {
  position: relative;
}
.bigRow .nfp.nf-player-container .VideoContainer {
  line-height: 0.7;
}
.bigRow .nfp.nf-player-container .VideoContainer video {
  position: relative;
}
.bigRow .button-container > a {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.bigRow .button-container {
  margin-left: 5%;
  padding: 1em 0;
  width: 93%;
  opacity: 0;
  -webkit-transition: opacity 1s ease-in 2s;
  -o-transition: opacity 1s ease-in 2s;
  -moz-transition: opacity 1s ease-in 2s;
  transition: opacity 1s ease-in 2s;
  bottom: 5%;
  position: absolute;
  z-index: 10;
}
.bigRow .button-container .icon-button-mylist-add:before {
  content: "\e641";
}
.bigRow .button-container .icon-button-mylist-add-reverse:before {
  content: "\e641";
}
.bigRow .button-container .icon-button-mylist-added:before {
  content: "\e804";
}
.bigRow .button-container .icon-button-mylist-added-reverse:before {
  content: "\e804";
}
.bigRow .button-container.animate {
  opacity: 1;
}
.bigRow .more-info-button,
.bigRow .mylist-button {
  font-size: 1.1vw;
  font-weight: 700;
  margin-right: 0.75em;
  padding: 0.57em 1.35em;
  color: #fff;
  border: 1px solid rgba(255, 255, 255, 0.4);
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
  background-image: none;
  background-color: rgba(0, 0, 0, 0.4);
  float: left;
  opacity: 1;
}
.bigRow .more-info-button .nf-icon-button-icon,
.bigRow .more-info-button .playRing,
.bigRow .mylist-button .nf-icon-button-icon,
.bigRow .mylist-button .playRing {
  margin-right: 0.71em;
  background-color: transparent;
  font-size: inherit;
  -webkit-transition: none;
  -o-transition: none;
  -moz-transition: none;
  transition: none;
}
.bigRow .more-info-button .icon-button-mylist-added,
.bigRow .more-info-button .icon-button-mylist-added-reverse,
.bigRow .mylist-button .icon-button-mylist-added,
.bigRow .mylist-button .icon-button-mylist-added-reverse {
  -webkit-transform: scale(1.5);
  -moz-transform: scale(1.5);
  -ms-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
}
.bigRow .more-info-button .nf-icon-button-label,
.bigRow .mylist-button .nf-icon-button-label {
  padding: 0;
  margin: 0;
  top: auto;
}
.bigRow .more-info-button:hover,
.bigRow .mylist-button:hover {
  background-color: rgba(51, 51, 51, 0.4);
}
.bigRow .more-info-button:hover .nf-icon-button-icon,
.bigRow .mylist-button:hover .nf-icon-button-icon {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.bigRow .more-info-button:hover .nf-icon-button-icon.icon-button-mylist-added,
.bigRow
  .more-info-button:hover
  .nf-icon-button-icon.icon-button-mylist-added-reverse,
.bigRow .mylist-button:hover .nf-icon-button-icon.icon-button-mylist-added,
.bigRow
  .mylist-button:hover
  .nf-icon-button-icon.icon-button-mylist-added-reverse {
  -webkit-transform: scale(1.5);
  -moz-transform: scale(1.5);
  -ms-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
}
.bigRow .audio-btn {
  top: 6px;
  right: 3%;
  position: relative;
  float: right;
  opacity: 0;
  -webkit-transition: opacity 1s ease-in;
  -o-transition: opacity 1s ease-in;
  -moz-transition: opacity 1s ease-in;
  transition: opacity 1s ease-in;
  pointer-events: none;
  z-index: 10;
}
.bigRow .audio-btn.hide {
  display: none;
}
.bigRow .hashtag,
.bigRow .more-info-button,
.bigRow .playLink {
  float: left;
  opacity: 1;
}
.bigRow .hashtag.hide,
.bigRow .more-info-button.hide,
.bigRow .playLink.hide {
  display: none;
}
.bigRow .more-info-button-hide {
  display: none !important;
}
.bigRow .annotation,
.bigRow .playRing {
  float: left;
}
.bigRow.light-tone .btn-flat {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}
@media screen and (max-width: 499px) {
  .lolomoRow.bigRowOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 7vw, 0);
    -moz-transform: translate3d(0, 7vw, 0);
    transform: translate3d(0, 7vw, 0);
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .lolomoRow.bigRowOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 21vw, 0);
    -moz-transform: translate3d(0, 21vw, 0);
    transform: translate3d(0, 21vw, 0);
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .lolomoRow.bigRowOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 25vw, 0);
    -moz-transform: translate3d(0, 25vw, 0);
    transform: translate3d(0, 25vw, 0);
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .lolomoRow.bigRowOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 29vw, 0);
    -moz-transform: translate3d(0, 29vw, 0);
    transform: translate3d(0, 29vw, 0);
  }
}
@media screen and (min-width: 1400px) {
  .lolomoRow.bigRowOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 29vw, 0);
    -moz-transform: translate3d(0, 29vw, 0);
    transform: translate3d(0, 29vw, 0);
  }
}
.bigRowOpen .newsFeed .button-container {
  bottom: 1%;
}
.bigRowOpen .newsFeed .hashtag {
  opacity: 0;
}
.bigRowOpen .newsFeed .playLink {
  opacity: 1;
  pointer-events: auto;
}
@media screen and (max-width: 499px) {
  .newsFeed .horizontal-logo .title-logo {
    width: 100%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .newsFeed .horizontal-logo .title-logo {
    width: 60%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .newsFeed .horizontal-logo .title-logo {
    width: 48%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .newsFeed .horizontal-logo .title-logo {
    width: 36%;
  }
}
@media screen and (min-width: 1400px) {
  .newsFeed .horizontal-logo .title-logo {
    width: 36%;
  }
}
.newsFeed .logo-during-video {
  position: absolute;
  -webkit-transition: opacity 1s ease-in 2s;
  -o-transition: opacity 1s ease-in 2s;
  -moz-transition: opacity 1s ease-in 2s;
  transition: opacity 1s ease-in 2s;
  z-index: 10;
  margin-left: 4%;
  margin-top: 1.5%;
  opacity: 0;
}
@media screen and (min-width: 1400px) {
  .newsFeed .logo-during-video {
    margin-left: 60px;
  }
}
.newsFeed .logo-during-video.animate {
  opacity: 1;
}
.newsFeed .logo-during-video.hide {
  display: none;
}
@media screen and (max-width: 499px) {
  .newsFeed .logo-during-video {
    width: 68%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .newsFeed .logo-during-video {
    width: 36%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .newsFeed .logo-during-video {
    width: 28%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .newsFeed .logo-during-video {
    width: 16%;
  }
}
@media screen and (min-width: 1400px) {
  .newsFeed .logo-during-video {
    width: 16%;
  }
}
.newsFeed .hashtag {
  font-size: 1.8vw;
  font-weight: 700;
  right: 0;
  bottom: 15%;
  position: absolute;
  visibility: hidden;
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .newsFeed .hashtag {
    visibility: visible;
  }
}
@media screen and (min-width: 1400px) {
  .newsFeed .hashtag {
    visibility: visible;
  }
}
.newsFeed .metadata {
  margin-top: 1.5%;
  margin-left: 4%;
}
@media screen and (max-width: 499px) {
  .newsFeed .metadata {
    margin-top: 3%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .newsFeed .metadata {
    margin-top: 1.7%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .newsFeed .metadata {
    margin-top: 1.5%;
  }
}
@media screen and (min-width: 1400px) {
  .newsFeed .metadata {
    margin-top: 1.5%;
  }
}
@media screen and (min-width: 1400px) {
  .newsFeed .metadata {
    margin-left: 60px;
  }
}
.newsFeed .button-container {
  margin-left: 4%;
  bottom: 4%;
}
@media screen and (min-width: 1400px) {
  .newsFeed .button-container {
    margin-left: 60px;
  }
}
.newsFeed.light-tone .hashtag {
  color: #000;
}
.originals-panels-row .slider .handle {
  height: 346%;
}
@media screen and (max-width: 499px) {
  .originals-panels-row .slider .handle {
    height: 346%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .originals-panels-row .slider .handle {
    height: 346%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .originals-panels-row .slider .handle {
    height: 346%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .originals-panels-row .slider .handle {
    height: 346%;
  }
}
@media screen and (min-width: 1400px) {
  .originals-panels-row .slider .handle {
    height: 347%;
  }
}
.originals-panels-row .rowContent .slider-item {
  background: #141414;
}
.originals-panels-row.jawBoneOpen .slider .handle {
  height: auto;
}
.originals-panels-row .rowContainer {
  min-height: 36.5vw;
}
@media screen and (max-width: 499px) {
  .originals-panels-row .rowContainer {
    min-height: 91vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .originals-panels-row .rowContainer {
    min-height: 60.5vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .originals-panels-row .rowContainer {
    min-height: 46.5vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .originals-panels-row .rowContainer {
    min-height: 36.5vw;
  }
}
@media screen and (min-width: 1400px) {
  .originals-panels-row .rowContainer {
    min-height: 31vw;
  }
}
.originals-panels-row .jawBoneContent {
  display: block;
  position: relative;
  background: 0 0;
}
.originals-panels-row .jawBoneContent .background.fullbleed {
  top: -10%;
}
.originals-panels-row .jawBoneContent .background.fullbleed .vignette {
  width: auto;
  left: 0;
  right: 0;
  background: -webkit-gradient(
      linear,
      left top,
      left bottom,
      color-stop(0, #141414),
      color-stop(10%, rgba(20, 20, 20, 0.6)),
      color-stop(20%, rgba(20, 20, 20, 0.2)),
      color-stop(25%, transparent)
    ),
    -webkit-gradient(linear, left top, right top, color-stop(4%, rgba(0, 0, 0, 0.5)), color-stop(30%, rgba(0, 0, 0, 0.3)), color-stop(58%, transparent));
  background: -webkit-linear-gradient(
      #141414 0,
      rgba(20, 20, 20, 0.6) 10%,
      rgba(20, 20, 20, 0.2) 20%,
      transparent 25%
    ),
    -webkit-linear-gradient(left, rgba(0, 0, 0, 0.5) 4%, rgba(0, 0, 0, 0.3) 30%, transparent
          58%);
  background: -moz-linear-gradient(
      #141414 0,
      rgba(20, 20, 20, 0.6) 10%,
      rgba(20, 20, 20, 0.2) 20%,
      transparent 25%
    ),
    -moz-linear-gradient(left, rgba(0, 0, 0, 0.5) 4%, rgba(0, 0, 0, 0.3) 30%, transparent
          58%);
  background: -o-linear-gradient(
      #141414 0,
      rgba(20, 20, 20, 0.6) 10%,
      rgba(20, 20, 20, 0.2) 20%,
      transparent 25%
    ),
    -o-linear-gradient(left, rgba(0, 0, 0, 0.5) 4%, rgba(0, 0, 0, 0.3) 30%, transparent
          58%);
  background: linear-gradient(
      #141414 0,
      rgba(20, 20, 20, 0.6) 10%,
      rgba(20, 20, 20, 0.2) 20%,
      transparent 25%
    ),
    linear-gradient(
      to right,
      rgba(0, 0, 0, 0.5) 4%,
      rgba(0, 0, 0, 0.3) 30%,
      transparent 58%
    );
  opacity: 1;
}
.originals-panels-row .jawBoneContent .background.fullbleed .vignette::before {
  background: 0 0;
}
.originals-panels-row .jawBonePane .overview .heroSynopsis,
.originals-panels-row .jawBonePane .overview .supplemental-message {
  color: #fff;
  font-weight: 400;
  line-height: 1.3;
  width: 100%;
  font-size: 1.3vw;
  margin: 0.8em 0 0 0;
}
.originals-panels-row .jawBonePane .overview .supplemental-message {
  font-weight: 700;
}
.originals-panels-row .jawBonePane .overview .jawbone-overview-info {
  padding-top: 0.6em;
}
.originals-panels-row .jawBonePane .overview .actionsRow {
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}
.originals-panels-row .jawBonePane .overview .actionsRow .myListWrapper {
  width: 100%;
  margin-bottom: 18px;
}
.originals-panels-row .loadingTitle .ratio-16x9.no-pulsate:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  padding-top: 200%;
  background-color: #333;
}
.originals-panels-row.jawBonePane .overview {
  color: #fff;
}
.originals-panels-row.jawBonePane .overview .heroSynopsis,
.originals-panels-row.jawBonePane .overview .supplemental-message {
  font-weight: 400;
  line-height: 1.3;
  width: 100%;
  font-size: 1.3vw;
  margin: 0.8em 0 0 0;
}
.originals-panels-row.jawBonePane .overview .supplemental-message {
  font-weight: 700;
}
.originals-panels-row.jawBonePane .overview .jawbone-overview-info {
  padding-top: 0.6em;
}
.originals-panels-row.jawBoneOpen ~ .lolomoRow {
  -webkit-transform: translate3d(0, 9.5vw, 0);
  -moz-transform: translate3d(0, 9.5vw, 0);
  transform: translate3d(0, 9.5vw, 0);
}
@media screen and (max-width: 499px) {
  .originals-panels-row.jawBoneOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 2.7vw, 0);
    -moz-transform: translate3d(0, 2.7vw, 0);
    transform: translate3d(0, 2.7vw, 0);
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .originals-panels-row.jawBoneOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 17.7vw, 0);
    -moz-transform: translate3d(0, 17.7vw, 0);
    transform: translate3d(0, 17.7vw, 0);
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .originals-panels-row.jawBoneOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 7vw, 0);
    -moz-transform: translate3d(0, 7vw, 0);
    transform: translate3d(0, 7vw, 0);
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .originals-panels-row.jawBoneOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 9.5vw, 0);
    -moz-transform: translate3d(0, 9.5vw, 0);
    transform: translate3d(0, 9.5vw, 0);
  }
}
@media screen and (min-width: 1400px) {
  .originals-panels-row.jawBoneOpen ~ .lolomoRow {
    -webkit-transform: translate3d(0, 11vw, 0);
    -moz-transform: translate3d(0, 11vw, 0);
    transform: translate3d(0, 11vw, 0);
  }
}
@media screen and (max-width: 499px) {
  .lolomoRow.bigRowOpen
    ~ .lolomoRow.originals-panels-row.jawBoneOpen
    ~ .lolomoRow,
  .lolomoRow.originals-panels-row.jawBoneOpen
    ~ .lolomoRow.bigRowOpen
    ~ .lolomoRow {
    -webkit-transform: translate3d(0, 9.7vw, 0);
    -moz-transform: translate3d(0, 9.7vw, 0);
    transform: translate3d(0, 9.7vw, 0);
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .lolomoRow.bigRowOpen
    ~ .lolomoRow.originals-panels-row.jawBoneOpen
    ~ .lolomoRow,
  .lolomoRow.originals-panels-row.jawBoneOpen
    ~ .lolomoRow.bigRowOpen
    ~ .lolomoRow {
    -webkit-transform: translate3d(0, 38.7vw, 0);
    -moz-transform: translate3d(0, 38.7vw, 0);
    transform: translate3d(0, 38.7vw, 0);
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .lolomoRow.bigRowOpen
    ~ .lolomoRow.originals-panels-row.jawBoneOpen
    ~ .lolomoRow,
  .lolomoRow.originals-panels-row.jawBoneOpen
    ~ .lolomoRow.bigRowOpen
    ~ .lolomoRow {
    -webkit-transform: translate3d(0, 32vw, 0);
    -moz-transform: translate3d(0, 32vw, 0);
    transform: translate3d(0, 32vw, 0);
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .lolomoRow.bigRowOpen
    ~ .lolomoRow.originals-panels-row.jawBoneOpen
    ~ .lolomoRow,
  .lolomoRow.originals-panels-row.jawBoneOpen
    ~ .lolomoRow.bigRowOpen
    ~ .lolomoRow {
    -webkit-transform: translate3d(0, 38.5vw, 0);
    -moz-transform: translate3d(0, 38.5vw, 0);
    transform: translate3d(0, 38.5vw, 0);
  }
}
@media screen and (min-width: 1400px) {
  .lolomoRow.bigRowOpen
    ~ .lolomoRow.originals-panels-row.jawBoneOpen
    ~ .lolomoRow,
  .lolomoRow.originals-panels-row.jawBoneOpen
    ~ .lolomoRow.bigRowOpen
    ~ .lolomoRow {
    -webkit-transform: translate3d(0, 40vw, 0);
    -moz-transform: translate3d(0, 40vw, 0);
    transform: translate3d(0, 40vw, 0);
  }
}
.noResultsWrapper {
  text-align: center;
}
.noResultsWrapper .noResults {
  display: inline-block;
  text-align: left;
}
.rail {
  margin: 1em 0 0 0;
  display: inline-block;
  min-height: 10px;
  width: 100%;
  font-size: 1.25vw;
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .rail {
    font-size: 1.0625vw;
  }
}
@media screen and (min-width: 1400px) {
  .rail {
    font-size: 0.9375vw;
  }
}
@media (max-width: 799px) {
  .rail {
    font-size: 11px;
  }
}
.dvds,
.people,
.suggestions {
  overflow: hidden;
  margin: 10px 0 20px 4%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
@media screen and (min-width: 1500px) {
  .dvds,
  .people,
  .suggestions {
    margin: 10px 0 20px 60px;
  }
}
.dvds ul,
.people ul,
.suggestions ul {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0;
  padding: 0;
}
.dvds ul li,
.people ul li,
.suggestions ul li {
  -webkit-box-flex: 0;
  -webkit-flex: 0 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 auto;
  flex: 0 auto;
  border-right: 1px solid grey;
  list-style: none;
  padding: 0 0.5em;
}
.dvds ul li a,
.people ul li a,
.suggestions ul li a {
  color: #fff;
}
.dvds ul li a:hover,
.people ul li a:hover,
.suggestions ul li a:hover {
  color: #e50914;
  text-decoration: none;
}
.dvds ul li:last-child,
.people ul li:last-child,
.suggestions ul li:last-child {
  border: none;
}
.dvds ul li.selected a,
.people ul li.selected a,
.suggestions ul li.selected a {
  color: grey;
}
.dvds .dvdLabel,
.dvds .peopleLabel,
.dvds .suggestionsLabel,
.people .dvdLabel,
.people .peopleLabel,
.people .suggestionsLabel,
.suggestions .dvdLabel,
.suggestions .peopleLabel,
.suggestions .suggestionsLabel {
  color: grey;
  -webkit-box-flex: 0;
  -webkit-flex: 0 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 auto;
  flex: 0 auto;
  margin-right: 5px;
  white-space: nowrap;
}
.dvds li {
  text-transform: capitalize;
}
.dvds li:last-child {
  text-transform: smallcase;
}
.dvdDetails {
  width: 50%;
  background-color: #333;
  margin: 0 auto 60px auto;
  position: relative;
  min-width: 750px;
  min-height: 200px;
}
.dvdDetails .dvdDetailsImg {
  display: inline-block;
  padding: 25px;
  min-width: 110px;
  background-image: url(https://assets.nflxext.com/ffe/siteui/akira/search/dvd_icon.png);
  background-repeat: no-repeat;
  background-position: right;
  margin-right: 20px;
  padding-right: 40px;
}
.dvdDetails .dvdDetailsText {
  position: absolute;
  font-color: #fff;
  width: 55%;
  display: inline-block;
  font-size: 20px;
  vertical-align: middle;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  margin-right: 10px;
}
.dvdDetails .dvdDetailsText a {
  color: #fff;
  display: inline-block;
}
.dvdDetails .dvdDetailsText a:hover {
  color: #e50914;
  text-decoration: none;
}
.dvdDetails .dvdDetailsText .dvdTitle {
  font-weight: 700;
  color: #fff;
}
.dvdDetails .dvdDetailsText .dvdTitle {
  font-size: 23px;
  margin-bottom: 10px;
}
.dvdDetails .dvdDetailsText .dvdSynopsis {
  font-size: 14px;
  text-align: justify;
  margin-bottom: 20px;
}
.dvdDetails .dvdDetailsText .dvdAction {
  border: 1px solid #fff;
  text-align: center;
  padding: 6px 10px;
  font-size: 14px;
  font-weight: 700;
}
.dvdDetails .dvdDetailsText .dvdAction:hover {
  background-color: #fff;
  color: #000;
}
.dvdDetails .dvdParent {
  position: absolute;
  right: 4%;
  top: 25%;
}
.dvdDetails .dvdParent .dvdIcon {
  width: 5em;
  height: 5em;
  -webkit-border-radius: 5em;
  -moz-border-radius: 5em;
  border-radius: 5em;
  font-size: 16px;
  color: #fff;
  background: #4d4d4d;
  position: absolute;
  top: 25%;
  right: 7%;
  display: -webkit-inline-box;
  display: -webkit-inline-flex;
  display: -moz-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-flow: column nowrap;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-flow: column nowrap;
  flex-flow: column nowrap;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.dvdDetails .dvdParent .dvdIcon span:first-child {
  font-weight: 700;
  top: 1em;
  font-size: 24px;
}
.suggestionHeader {
  padding: 36px 0 36px 0;
  margin: 0 4%;
}
@media screen and (min-width: 1500px) {
  .suggestionHeader {
    margin: 0 60px;
  }
}
.suggestionHeader .title {
  display: inline-block;
  margin-right: 20px;
  line-height: 36px;
  font-size: 30px;
}
.suggestionRailContainer {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.search-title-header {
  min-height: 65px;
}
.notifications {
  white-space: normal;
}
.notifications .sub-menu-list {
  margin: 0;
}
.notifications .notifications-menu {
  background-color: transparent;
  border: none;
  font-size: 1.5em;
  line-height: 1;
  margin-top: 0.2em;
  padding: 2px 6px 3px;
  position: relative;
}
.notifications .callout-arrow {
  border: solid 7px;
  border-color: transparent transparent #e5e5e5;
  bottom: -17px;
  height: 0;
  left: 50%;
  margin-left: -7px;
  width: 0;
  position: absolute;
}
.notifications .notification-pill {
  font-size: 0.5em;
  line-height: 1;
  z-index: 2;
  position: absolute;
  top: -0.25em;
  right: -0.1em;
}
.notifications .sub-menu {
  font-size: 16px;
  right: 0;
  padding: 0;
  top: 54px;
  background-color: inherit;
}
.notifications .sub-menu .sub-menu-list {
  padding: 0;
}
.notifications .notifications-container {
  display: block;
  max-height: 80vh;
  max-height: -webkit-calc(100vh - 280px);
  max-height: -moz-calc(100vh - 280px);
  max-height: calc(100vh - 280px);
  min-height: 100px;
  overflow: auto;
  padding: 0;
  list-style: none;
  width: 408px;
}
.notifications .notification {
  color: #fff;
  line-height: 1;
  position: relative;
  border-bottom: 1px solid rgba(255, 255, 255, 0.25);
  background-color: rgba(0, 0, 0, 0.85);
}
.notifications .notification:hover {
  background: #000;
}
.notifications .notification.is-new:before {
  content: "";
  position: absolute;
  left: 0;
  width: 4px;
  top: 12px;
  bottom: 12px;
  background-color: #b9090b;
}
.notifications.direction-top .callout-arrow {
  border-color: #e5e5e5 transparent transparent;
  bottom: auto;
  top: -23px;
}
.notifications.direction-top .sub-menu {
  bottom: 56px;
  top: auto;
}
.image-text-notification {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
}
.image-text-notification .element {
  padding: 16px;
  -webkit-box-flex: 1;
  -webkit-flex: auto;
  -moz-box-flex: 1;
  -ms-flex: auto;
  flex: auto;
}
.image-text-notification .element + .element {
  padding-left: 0;
}
.image-text-notification .text {
  line-height: 1.2;
  color: #ccc;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.image-text-notification .text:hover {
  color: #fff;
}
.image-text-notification .age {
  font-size: 12px;
  line-height: 1.3;
  color: grey;
  margin-top: 3px;
}
.image-text-notification .image {
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 0;
  -webkit-flex-grow: 0;
  -moz-box-flex: 0;
  -ms-flex-positive: 0;
  flex-grow: 0;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.image-text-notification .image .title-card {
  width: 112px;
}
.image-text-notification .multi-landing-stack-space-holder {
  position: relative;
  width: 112px;
  height: 63px;
}
.image-text-notification
  .multi-landing-stack-space-holder
  .multi-landing-stack {
  position: absolute;
  height: 56px;
  width: 103px;
  -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.24),
    0 0 2px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.24),
    0 0 2px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.24), 0 0 2px 0 rgba(0, 0, 0, 0.12);
}
.image-text-notification
  .multi-landing-stack-space-holder
  .multi-landing-stack-img {
  top: 0;
  left: 0;
  z-index: 3;
}
.image-text-notification
  .multi-landing-stack-space-holder
  .multi-landing-stack-1 {
  top: 2px;
  left: 3px;
  z-index: 2;
  background-color: #dbdbd7;
}
.image-text-notification
  .multi-landing-stack-space-holder
  .multi-landing-stack-2 {
  top: 5px;
  left: 7px;
  z-index: 1;
  background-color: #c2c2be;
}
.empty-notification {
  color: #6d6d6d;
  margin: 0;
  padding: 50px 0;
  min-height: 100px;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  text-align: center;
}
.play-action {
  -webkit-transition: opacity 150ms ease;
  -o-transition: opacity 150ms ease;
  -moz-transition: opacity 150ms ease;
  transition: opacity 150ms ease;
  opacity: 0;
  background-color: rgba(0, 0, 0, 0.6);
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
.play-action:focus,
.play-action:hover {
  opacity: 1;
}
.play-action .playable-icon {
  font-size: 44px;
  height: 48.4px;
  width: 48.4px;
  margin-left: -23.1px;
  margin-top: -23.1px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #fff;
  opacity: 1;
  position: absolute;
  z-index: 100;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: 0;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
  top: 50%;
  left: 50%;
}
.play-action .playable-icon:focus,
.play-action .playable-icon:hover {
  text-decoration: none;
  opacity: 1;
  -webkit-transform: scale(1, 1);
  -moz-transform: scale(1, 1);
  -ms-transform: scale(1, 1);
  -o-transform: scale(1, 1);
  transform: scale(1, 1);
}
.play-action .playable-icon:focus .playRing,
.play-action .playable-icon:hover .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.play-action .playable-icon:focus .play,
.play-action .playable-icon:hover .play {
  color: #e50914;
}
.play-action .playable-icon .annotation {
  text-align: center;
  position: absolute;
  width: 200%;
  font-size: 18%;
  left: -50%;
  white-space: nowrap;
  bottom: -12.32px;
  font-weight: 700;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
}
.play-action .playable-icon .playRing {
  height: 44px;
  width: 44px;
  border: 2.2px solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
}
.play-action .playable-icon .playRing:after {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  content: "";
  position: absolute;
  z-index: -1;
  left: 0;
  height: 100%;
  width: 100%;
}
.play-action .playable-icon .play {
  line-height: 44px;
  width: 100%;
  color: #fff;
  font-size: 46%;
  left: 6%; /*!rtl:ignore*/
  text-align: center;
  position: absolute;
}
.play-action .playable-icon .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.play-action .playable-icon .play {
  line-height: 40px;
  color: #e50914;
}
.extended-diacritics-language .image-text-notification .text {
  line-height: 1.4;
}
.notification-landing {
  margin-top: 20px;
  padding: 0 0 37vw;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .notification-landing {
    padding: 0 0 42vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .notification-landing {
    padding: 0 0 37vw;
  }
}
@media screen and (min-width: 1400px) {
  .notification-landing {
    padding: 0 0 32vw;
  }
}
.notification-landing-title {
  font-size: 32px;
  color: #fff;
  padding: 0 4%;
  margin-top: 1vw;
}
@media screen and (min-width: 1500px) {
  .notification-landing-title {
    padding: 0 60px;
  }
}
.kidsPage .notification-landing-title {
  color: #333;
}
.notification-landing-summary {
  font-size: 20px;
  color: #fff;
  line-height: 26px;
  margin-top: 1.5vw;
  padding: 0 4%;
}
@media screen and (min-width: 1500px) {
  .notification-landing-summary {
    padding: 0 33vw 0 60px;
  }
}
@media screen and (min-width: 1200px) {
  .notification-landing-summary {
    padding-right: 33vw;
  }
}
.kidsPage .notification-landing-summary {
  color: #333;
}
.notification-landing-row.lolomoRow.lolomoRow_title_card {
  margin-top: 1.5vw;
}
.notification-landing-back-to-home-container {
  text-align: center;
}
.nfDropDown.theme-lakira {
  position: relative;
  text-align: left;
}
.nfDropDown.theme-lakira.open {
  z-index: 1;
}
.nfDropDown.theme-lakira .label {
  height: 2rem;
  padding-left: 10px;
  line-height: 2rem;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-size: 0.9rem;
  font-weight: 700;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border: 1px solid rgba(255, 255, 255, 0.9);
  display: inline-block;
  color: #fff;
  background-color: #000;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
  position: relative;
  padding-right: 50px;
}
.nfDropDown.theme-lakira .label:hover {
  background-color: rgba(255, 255, 255, 0.1);
  cursor: pointer;
}
.nfDropDown.theme-lakira .label .arrow {
  border-color: #fff transparent transparent;
  border-style: solid;
  border-width: 5px 5px 0;
  height: 0;
  position: absolute;
  right: 10px;
  top: 44%;
  width: 0;
}
.nfDropDown.theme-lakira .label.loading {
  visibility: hidden;
}
.nfDropDown.theme-lakira .sub-menu {
  overflow-x: hidden;
  z-index: 2;
  padding: 0;
  margin: 0;
  top: 2rem;
  left: 0;
  font-size: 14px;
}
.nfDropDown.theme-lakira .sub-menu .sub-menu-list,
.nfDropDown.theme-lakira .sub-menu .sub-menu-list-special {
  padding: 5px 0;
  margin: 0;
}
.nfDropDown.theme-lakira .sub-menu .sub-menu-item a {
  padding: 1px 20px 1px 10px;
}
.nfDropDown.theme-lakira .sub-menu .sub-menu-link {
  display: inline-block;
  width: 100%;
  padding: 1px 0;
}
.nfDropDown.theme-lakira .sub-menu::-webkit-scrollbar {
  width: 10px;
  background-color: #333;
}
.nfDropDown.theme-lakira .sub-menu::-webkit-scrollbar:hover {
  background-color: #4d4d4d;
}
.nfDropDown.theme-lakira .sub-menu::-webkit-scrollbar-thumb {
  width: 6px;
  background-color: grey;
}
.nfDropDown.theme-lakira .sub-menu::-webkit-scrollbar-thumb:hover {
  background-color: #ccc;
}
.nfDropDown.theme-lakira .sub-menu::-webkit-scrollbar-corner {
  background-color: #333;
}
.nfDropDown.theme-lakira.widthRestricted {
  display: inline-block;
  position: relative;
}
.nfDropDown.theme-lakira.widthRestricted .label {
  width: 100%;
}
.nfDropDown.theme-lakira.widthRestricted .sub-menu {
  min-width: 100%;
  white-space: nowrap;
}
.nfDropDown.theme-lakira.widthRestricted .sub-menu .sub-menu-list,
.nfDropDown.theme-lakira.widthRestricted .sub-menu .sub-menu-list-special {
  width: 100%;
}
.starbar {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  color: #333;
  margin-right: 0.5em;
  width: 5.6em;
}
.starbar.verticalCenter {
  -ms-flex-align: center;
  align-items: center;
  -webkit-align-items: center;
  -webkit-box-align: center;
  -moz-box-align: center;
  -ms-box-align: center;
}
.starbar.hasClearRating {
  width: 8em;
}
.starbar.lightBackground .star.sb-placeholder {
  color: #ccc;
}
.starbar:not(.readOnly) {
  cursor: pointer;
}
.star {
  display: inline-block;
  margin: 0;
  padding: 0;
  vertical-align: middle;
  height: auto;
  width: auto;
  min-width: 0.8em;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  -webkit-flex-basis: 0;
  -ms-flex-preferred-size: 0;
  flex-basis: 0;
}
.star.default {
  color: #e50914;
}
.star.hover {
  color: #e1cb2b;
}
.star.personal {
  color: #e1cb2b;
}
.star.sb-placeholder {
  color: #333;
}
.star.clear-rating {
  margin-left: 8px;
  margin-top: -2px;
  font-size: 24pt;
  font-family: times serif;
}
.transitionWrap {
  position: relative;
  min-width: 1em;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  -webkit-flex-basis: 0;
  -ms-flex-preferred-size: 0;
  flex-basis: 0;
}
.transitionWrap .star {
  z-index: 1;
  position: absolute;
}
.transitionWrap .star:first-child {
  z-index: 2;
  text-shadow: none;
}
.transitionWrap .star:first-child:before {
  display: inline-block;
  -webkit-transform: none;
  -moz-transform: none;
  -ms-transform: none;
  -o-transform: none;
  transform: none;
}
.starbar-tooltip {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  position: absolute;
  width: 120%;
  white-space: normal;
  background: #fff;
  border: 1px solid #ccc;
  font-size: 1.2vw;
  font-weight: 400;
  text-align: center;
  bottom: 100%;
  left: -10%;
  z-index: 10;
  padding: 4px 10px;
  margin-bottom: 10px;
  color: #000;
}
.starbar-tooltip:after {
  top: 100%;
  left: 50%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  border-color: rgba(255, 255, 255, 0);
  border-top-color: #fff;
  border-width: 6px 8px;
  margin-left: -6px;
  pointer-events: none;
}
.starbar-tooltip.rating-1:after {
  left: 16%;
}
.starbar-tooltip.rating-2:after {
  left: 32%;
}
.starbar-tooltip.rating-3:after {
  left: 49%;
}
.starbar-tooltip.rating-4:after {
  left: 66%;
}
.starbar-tooltip.rating-5:after {
  left: 83%;
}
.progress {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.progress .summary {
  font-weight: 700;
  color: rgba(255, 255, 255, 0.3);
}
.progress-bar {
  display: block;
  position: relative;
  height: 2px;
  background-color: rgba(255, 255, 255, 0.3);
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  margin: 1px 8px 0 0;
}
.progress-completed {
  position: absolute;
  top: 0;
  left: 0;
  height: 2px;
  background-color: #e50914;
}
.progress-summary {
  margin-left: 0.5em;
}
.episodeLockup {
  padding-right: 30px;
  vertical-align: top;
}
.episodeLockup .episodeTitle {
  width: 100%;
  font-weight: 700;
  font-size: 1vw;
  margin: 0.5vw 0 0;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .episodeLockup .episodeTitle {
    font-size: 1.5vw;
    margin: 0.75vw 0 0;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .episodeLockup .episodeTitle {
    font-size: 1.2vw;
    margin: 0.6vw 0 0;
  }
}
@media screen and (min-width: 1400px) {
  .episodeLockup .episodeTitle {
    font-size: 0.9vw;
    margin: 0.45vw 0 0;
  }
}
.episodeLockup .episodeTitle .ellipsized {
  margin: 0;
  display: inline-block;
  white-space: nowrap;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  overflow: hidden;
  width: 70%;
  vertical-align: middle;
}
.episodeLockup .episodeTitle .duration {
  display: inline-block;
  text-align: right;
  width: 30%;
}
.episodeLockup .episodeSynopsis {
  color: #999;
  font-size: 0.83333vw;
  margin: 0 0 0.166666vw;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .episodeLockup .episodeSynopsis {
    font-size: 1.249995vw;
    margin: 0 0 0.249999vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .episodeLockup .episodeSynopsis {
    font-size: 1.083329vw;
    margin: 0 0 0.2166658vw;
  }
}
@media screen and (min-width: 1400px) {
  .episodeLockup .episodeSynopsis {
    font-size: 0.916663vw;
    margin: 0 0 0.1833326vw;
  }
}
.episodeLockup .episodeArt {
  position: relative;
  -moz-background-size: cover;
  background-size: cover;
  background-color: #1a1a1a;
}
.episodeLockup .episodeArt .progress {
  position: absolute;
  bottom: 4%;
  left: 2.5%;
  right: 2.5%;
}
.episodeLockup .episodeArt .progress .progress-bar {
  margin: 1px 0 0 0;
}
.episodeLockup .episodeNumber {
  position: absolute;
  bottom: 7%;
  left: 2%;
  letter-spacing: -2px;
  color: #fff;
  font-weight: 300;
  line-height: 1;
  font-size: 1.875vw;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .episodeLockup .episodeNumber {
    font-size: 2.71875vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .episodeLockup .episodeNumber {
    font-size: 2.4375vw;
  }
}
@media screen and (min-width: 1400px) {
  .episodeLockup .episodeNumber {
    font-size: 2.15625vw;
  }
}
.episodeLockup .episodeNumber.noProgress {
  bottom: 2%;
}
.episodeLockup .numberVignette {
  position: absolute;
  bottom: -1px;
  left: 0;
  right: 0;
  top: 0;
  background-color: rgba(0, 0, 0, 0);
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(rgba(0, 0, 0, 0)),
    color-stop(65%, rgba(0, 0, 0, 0)),
    to(rgba(0, 0, 0, 0.6))
  );
  background-image: -webkit-linear-gradient(
    top,
    rgba(0, 0, 0, 0) 0,
    rgba(0, 0, 0, 0) 65%,
    rgba(0, 0, 0, 0.6) 100%
  );
  background-image: -moz-linear-gradient(
    top,
    rgba(0, 0, 0, 0) 0,
    rgba(0, 0, 0, 0) 65%,
    rgba(0, 0, 0, 0.6) 100%
  );
  background-image: -o-linear-gradient(
    top,
    rgba(0, 0, 0, 0) 0,
    rgba(0, 0, 0, 0) 65%,
    rgba(0, 0, 0, 0.6) 100%
  );
  background-image: linear-gradient(
    to bottom,
    rgba(0, 0, 0, 0) 0,
    rgba(0, 0, 0, 0) 65%,
    rgba(0, 0, 0, 0.6) 100%
  );
  pointer-events: none;
}
.episodeLockup.current .duration,
.episodeLockup.current .episodeSynopsis,
.episodeLockup.current .episodeTitle {
  color: #fff;
}
.episodeLockup .episodePlay {
  left: 50%;
  top: 50%;
  font-size: 3vw;
  height: 3.3vw;
  width: 3.3vw;
  margin-left: -1.575vw;
  margin-top: -1.575vw;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #fff;
  opacity: 0;
  position: absolute;
  z-index: 100;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: 0;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
}
.episodeLockup .episodePlay:focus,
.episodeLockup .episodePlay:hover {
  text-decoration: none;
  opacity: 1;
  -webkit-transform: scale(1.08, 1.08);
  -moz-transform: scale(1.08, 1.08);
  -ms-transform: scale(1.08, 1.08);
  -o-transform: scale(1.08, 1.08);
  transform: scale(1.08, 1.08);
}
.episodeLockup .episodePlay:focus .playRing,
.episodeLockup .episodePlay:hover .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.episodeLockup .episodePlay:focus .play,
.episodeLockup .episodePlay:hover .play {
  color: #e50914;
}
.episodeLockup .episodePlay .annotation {
  text-align: center;
  position: absolute;
  width: 200%;
  font-size: 18%;
  left: -50%;
  white-space: nowrap;
  bottom: -0.84vw;
  font-weight: 700;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
}
.episodeLockup .episodePlay .playRing {
  height: 3vw;
  width: 3vw;
  border: 0.15vw solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
}
.episodeLockup .episodePlay .playRing:after {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  content: "";
  position: absolute;
  z-index: -1;
  left: 0;
  height: 100%;
  width: 100%;
}
.episodeLockup .episodePlay .play {
  line-height: 3vw;
  width: 100%;
  color: #fff;
  font-size: 46%;
  left: 6%; /*!rtl:ignore*/
  text-align: center;
  position: absolute;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .episodeLockup .episodePlay {
    font-size: 5vw;
    height: 5.5vw;
    width: 5.5vw;
    margin-left: -2.625vw;
    margin-top: -2.625vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .episodeLockup .episodePlay:focus,
  .episodeLockup .episodePlay:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .episodeLockup .episodePlay:focus .playRing,
  .episodeLockup .episodePlay:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .episodeLockup .episodePlay:focus .play,
  .episodeLockup .episodePlay:hover .play {
    color: #e50914;
  }
  .episodeLockup .episodePlay .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.4vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .episodeLockup .episodePlay .playRing {
    height: 5vw;
    width: 5vw;
    border: 0.25vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .episodeLockup .episodePlay .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .episodeLockup .episodePlay .play {
    line-height: 5vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .episodeLockup .episodePlay {
    font-size: 5vw;
    height: 5.5vw;
    width: 5.5vw;
    margin-left: -2.625vw;
    margin-top: -2.625vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .episodeLockup .episodePlay:focus,
  .episodeLockup .episodePlay:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .episodeLockup .episodePlay:focus .playRing,
  .episodeLockup .episodePlay:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .episodeLockup .episodePlay:focus .play,
  .episodeLockup .episodePlay:hover .play {
    color: #e50914;
  }
  .episodeLockup .episodePlay .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.4vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .episodeLockup .episodePlay .playRing {
    height: 5vw;
    width: 5vw;
    border: 0.25vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .episodeLockup .episodePlay .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .episodeLockup .episodePlay .play {
    line-height: 5vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
@media screen and (min-width: 1400px) {
  .episodeLockup .episodePlay {
    font-size: 4vw;
    height: 4.4vw;
    width: 4.4vw;
    margin-left: -2.1vw;
    margin-top: -2.1vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .episodeLockup .episodePlay:focus,
  .episodeLockup .episodePlay:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .episodeLockup .episodePlay:focus .playRing,
  .episodeLockup .episodePlay:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .episodeLockup .episodePlay:focus .play,
  .episodeLockup .episodePlay:hover .play {
    color: #e50914;
  }
  .episodeLockup .episodePlay .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.12vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .episodeLockup .episodePlay .playRing {
    height: 4vw;
    width: 4vw;
    border: 0.2vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .episodeLockup .episodePlay .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .episodeLockup .episodePlay .play {
    line-height: 4vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
.episodeLockup:hover .episodePlay {
  opacity: 0.7;
}
.episodeLockup.titleBehaviorData.current .availabilityDateMessaging {
  color: #fff;
}
.episodeLockup.titleBehaviorData .episodeTitle p {
  width: 100%;
  margin-bottom: 0.3em;
}
.episodeLockup.titleBehaviorData .bottom-metadata {
  font-size: 0.83333vw;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .episodeLockup.titleBehaviorData .bottom-metadata {
    font-size: 1.249995vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .episodeLockup.titleBehaviorData .bottom-metadata {
    font-size: 1.083329vw;
  }
}
@media screen and (min-width: 1400px) {
  .episodeLockup.titleBehaviorData .bottom-metadata {
    font-size: 0.916663vw;
  }
}
.episodeLockup.titleBehaviorData .availabilityDateMessaging {
  margin-right: 10px;
}
.simsLockup,
.trailerLockup {
  padding-right: 30px;
  font-size: 0.83333vw;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .simsLockup,
  .trailerLockup {
    font-size: 1.249995vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .simsLockup,
  .trailerLockup {
    font-size: 1.083329vw;
  }
}
@media screen and (min-width: 1400px) {
  .simsLockup,
  .trailerLockup {
    font-size: 0.916663vw;
  }
}
.simsLockup .trailerTitle,
.trailerLockup .trailerTitle {
  font-weight: 700;
}
.simsLockup .simsSynopsis,
.trailerLockup .simsSynopsis {
  width: auto;
}
.simsLockup .video-artwork,
.trailerLockup .video-artwork {
  margin-bottom: 0.5vw;
  position: relative;
  z-index: 3;
  -moz-background-size: cover;
  background-size: cover;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .simsLockup .video-artwork,
  .trailerLockup .video-artwork {
    margin-bottom: 0.75vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .simsLockup .video-artwork,
  .trailerLockup .video-artwork {
    margin-bottom: 0.6vw;
  }
}
@media screen and (min-width: 1400px) {
  .simsLockup .video-artwork,
  .trailerLockup .video-artwork {
    margin-bottom: 0.45vw;
  }
}
.simsLockup .sims-artwork,
.simsLockup .trailer-artwork,
.trailerLockup .sims-artwork,
.trailerLockup .trailer-artwork {
  background-color: #1a1a1a;
}
.simsLockup .simsPlay,
.simsLockup .trailerPlay,
.trailerLockup .simsPlay,
.trailerLockup .trailerPlay {
  left: 50%;
  top: 50%;
  font-size: 4vw;
  height: 4.4vw;
  width: 4.4vw;
  margin-left: -2.1vw;
  margin-top: -2.1vw;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #fff;
  opacity: 0;
  position: absolute;
  z-index: 100;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: 0;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
}
.simsLockup .simsPlay:focus,
.simsLockup .simsPlay:hover,
.simsLockup .trailerPlay:focus,
.simsLockup .trailerPlay:hover,
.trailerLockup .simsPlay:focus,
.trailerLockup .simsPlay:hover,
.trailerLockup .trailerPlay:focus,
.trailerLockup .trailerPlay:hover {
  text-decoration: none;
  opacity: 1;
  -webkit-transform: scale(1.08, 1.08);
  -moz-transform: scale(1.08, 1.08);
  -ms-transform: scale(1.08, 1.08);
  -o-transform: scale(1.08, 1.08);
  transform: scale(1.08, 1.08);
}
.simsLockup .simsPlay:focus .playRing,
.simsLockup .simsPlay:hover .playRing,
.simsLockup .trailerPlay:focus .playRing,
.simsLockup .trailerPlay:hover .playRing,
.trailerLockup .simsPlay:focus .playRing,
.trailerLockup .simsPlay:hover .playRing,
.trailerLockup .trailerPlay:focus .playRing,
.trailerLockup .trailerPlay:hover .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.simsLockup .simsPlay:focus .play,
.simsLockup .simsPlay:hover .play,
.simsLockup .trailerPlay:focus .play,
.simsLockup .trailerPlay:hover .play,
.trailerLockup .simsPlay:focus .play,
.trailerLockup .simsPlay:hover .play,
.trailerLockup .trailerPlay:focus .play,
.trailerLockup .trailerPlay:hover .play {
  color: #e50914;
}
.simsLockup .simsPlay .annotation,
.simsLockup .trailerPlay .annotation,
.trailerLockup .simsPlay .annotation,
.trailerLockup .trailerPlay .annotation {
  text-align: center;
  position: absolute;
  width: 200%;
  font-size: 18%;
  left: -50%;
  white-space: nowrap;
  bottom: -1.12vw;
  font-weight: 700;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
}
.simsLockup .simsPlay .playRing,
.simsLockup .trailerPlay .playRing,
.trailerLockup .simsPlay .playRing,
.trailerLockup .trailerPlay .playRing {
  height: 4vw;
  width: 4vw;
  border: 0.2vw solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
}
.simsLockup .simsPlay .playRing:after,
.simsLockup .trailerPlay .playRing:after,
.trailerLockup .simsPlay .playRing:after,
.trailerLockup .trailerPlay .playRing:after {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  content: "";
  position: absolute;
  z-index: -1;
  left: 0;
  height: 100%;
  width: 100%;
}
.simsLockup .simsPlay .play,
.simsLockup .trailerPlay .play,
.trailerLockup .simsPlay .play,
.trailerLockup .trailerPlay .play {
  line-height: 4vw;
  width: 100%;
  color: #fff;
  font-size: 46%;
  left: 6%; /*!rtl:ignore*/
  text-align: center;
  position: absolute;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .simsLockup .simsPlay,
  .simsLockup .trailerPlay,
  .trailerLockup .simsPlay,
  .trailerLockup .trailerPlay {
    font-size: 6vw;
    height: 6.6vw;
    width: 6.6vw;
    margin-left: -3.15vw;
    margin-top: -3.15vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .simsLockup .simsPlay:focus,
  .simsLockup .simsPlay:hover,
  .simsLockup .trailerPlay:focus,
  .simsLockup .trailerPlay:hover,
  .trailerLockup .simsPlay:focus,
  .trailerLockup .simsPlay:hover,
  .trailerLockup .trailerPlay:focus,
  .trailerLockup .trailerPlay:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .simsLockup .simsPlay:focus .playRing,
  .simsLockup .simsPlay:hover .playRing,
  .simsLockup .trailerPlay:focus .playRing,
  .simsLockup .trailerPlay:hover .playRing,
  .trailerLockup .simsPlay:focus .playRing,
  .trailerLockup .simsPlay:hover .playRing,
  .trailerLockup .trailerPlay:focus .playRing,
  .trailerLockup .trailerPlay:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .simsLockup .simsPlay:focus .play,
  .simsLockup .simsPlay:hover .play,
  .simsLockup .trailerPlay:focus .play,
  .simsLockup .trailerPlay:hover .play,
  .trailerLockup .simsPlay:focus .play,
  .trailerLockup .simsPlay:hover .play,
  .trailerLockup .trailerPlay:focus .play,
  .trailerLockup .trailerPlay:hover .play {
    color: #e50914;
  }
  .simsLockup .simsPlay .annotation,
  .simsLockup .trailerPlay .annotation,
  .trailerLockup .simsPlay .annotation,
  .trailerLockup .trailerPlay .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.68vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .simsLockup .simsPlay .playRing,
  .simsLockup .trailerPlay .playRing,
  .trailerLockup .simsPlay .playRing,
  .trailerLockup .trailerPlay .playRing {
    height: 6vw;
    width: 6vw;
    border: 0.3vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .simsLockup .simsPlay .playRing:after,
  .simsLockup .trailerPlay .playRing:after,
  .trailerLockup .simsPlay .playRing:after,
  .trailerLockup .trailerPlay .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .simsLockup .simsPlay .play,
  .simsLockup .trailerPlay .play,
  .trailerLockup .simsPlay .play,
  .trailerLockup .trailerPlay .play {
    line-height: 6vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .simsLockup .simsPlay,
  .simsLockup .trailerPlay,
  .trailerLockup .simsPlay,
  .trailerLockup .trailerPlay {
    font-size: 4.8vw;
    height: 5.28vw;
    width: 5.28vw;
    margin-left: -2.52vw;
    margin-top: -2.52vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .simsLockup .simsPlay:focus,
  .simsLockup .simsPlay:hover,
  .simsLockup .trailerPlay:focus,
  .simsLockup .trailerPlay:hover,
  .trailerLockup .simsPlay:focus,
  .trailerLockup .simsPlay:hover,
  .trailerLockup .trailerPlay:focus,
  .trailerLockup .trailerPlay:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .simsLockup .simsPlay:focus .playRing,
  .simsLockup .simsPlay:hover .playRing,
  .simsLockup .trailerPlay:focus .playRing,
  .simsLockup .trailerPlay:hover .playRing,
  .trailerLockup .simsPlay:focus .playRing,
  .trailerLockup .simsPlay:hover .playRing,
  .trailerLockup .trailerPlay:focus .playRing,
  .trailerLockup .trailerPlay:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .simsLockup .simsPlay:focus .play,
  .simsLockup .simsPlay:hover .play,
  .simsLockup .trailerPlay:focus .play,
  .simsLockup .trailerPlay:hover .play,
  .trailerLockup .simsPlay:focus .play,
  .trailerLockup .simsPlay:hover .play,
  .trailerLockup .trailerPlay:focus .play,
  .trailerLockup .trailerPlay:hover .play {
    color: #e50914;
  }
  .simsLockup .simsPlay .annotation,
  .simsLockup .trailerPlay .annotation,
  .trailerLockup .simsPlay .annotation,
  .trailerLockup .trailerPlay .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.344vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .simsLockup .simsPlay .playRing,
  .simsLockup .trailerPlay .playRing,
  .trailerLockup .simsPlay .playRing,
  .trailerLockup .trailerPlay .playRing {
    height: 4.8vw;
    width: 4.8vw;
    border: 0.24vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .simsLockup .simsPlay .playRing:after,
  .simsLockup .trailerPlay .playRing:after,
  .trailerLockup .simsPlay .playRing:after,
  .trailerLockup .trailerPlay .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .simsLockup .simsPlay .play,
  .simsLockup .trailerPlay .play,
  .trailerLockup .simsPlay .play,
  .trailerLockup .trailerPlay .play {
    line-height: 4.8vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
@media screen and (min-width: 1400px) {
  .simsLockup .simsPlay,
  .simsLockup .trailerPlay,
  .trailerLockup .simsPlay,
  .trailerLockup .trailerPlay {
    font-size: 3.6vw;
    height: 3.96vw;
    width: 3.96vw;
    margin-left: -1.89vw;
    margin-top: -1.89vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .simsLockup .simsPlay:focus,
  .simsLockup .simsPlay:hover,
  .simsLockup .trailerPlay:focus,
  .simsLockup .trailerPlay:hover,
  .trailerLockup .simsPlay:focus,
  .trailerLockup .simsPlay:hover,
  .trailerLockup .trailerPlay:focus,
  .trailerLockup .trailerPlay:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .simsLockup .simsPlay:focus .playRing,
  .simsLockup .simsPlay:hover .playRing,
  .simsLockup .trailerPlay:focus .playRing,
  .simsLockup .trailerPlay:hover .playRing,
  .trailerLockup .simsPlay:focus .playRing,
  .trailerLockup .simsPlay:hover .playRing,
  .trailerLockup .trailerPlay:focus .playRing,
  .trailerLockup .trailerPlay:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .simsLockup .simsPlay:focus .play,
  .simsLockup .simsPlay:hover .play,
  .simsLockup .trailerPlay:focus .play,
  .simsLockup .trailerPlay:hover .play,
  .trailerLockup .simsPlay:focus .play,
  .trailerLockup .simsPlay:hover .play,
  .trailerLockup .trailerPlay:focus .play,
  .trailerLockup .trailerPlay:hover .play {
    color: #e50914;
  }
  .simsLockup .simsPlay .annotation,
  .simsLockup .trailerPlay .annotation,
  .trailerLockup .simsPlay .annotation,
  .trailerLockup .trailerPlay .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.008vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .simsLockup .simsPlay .playRing,
  .simsLockup .trailerPlay .playRing,
  .trailerLockup .simsPlay .playRing,
  .trailerLockup .trailerPlay .playRing {
    height: 3.6vw;
    width: 3.6vw;
    border: 0.18vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .simsLockup .simsPlay .playRing:after,
  .simsLockup .trailerPlay .playRing:after,
  .trailerLockup .simsPlay .playRing:after,
  .trailerLockup .trailerPlay .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .simsLockup .simsPlay .play,
  .simsLockup .trailerPlay .play,
  .trailerLockup .simsPlay .play,
  .trailerLockup .trailerPlay .play {
    line-height: 3.6vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
.simsLockup .mylist-button,
.trailerLockup .mylist-button {
  opacity: 0;
  position: absolute;
  bottom: 5px;
  right: 5px;
}
.simsLockup .mylist-button:focus,
.trailerLockup .mylist-button:focus {
  opacity: 1;
}
.simsLockup .meta,
.trailerLockup .meta {
  margin: 0 0 4px 0;
}
.simsLockup:hover .mylist-button,
.simsLockup:hover .simsPlay,
.simsLockup:hover .trailerPlay,
.trailerLockup:hover .mylist-button,
.trailerLockup:hover .simsPlay,
.trailerLockup:hover .trailerPlay {
  opacity: 0.7;
}
.simsLockup:focus,
.trailerLockup:focus {
  outline: 0;
}
.simsLockup .divider,
.trailerLockup .divider {
  height: 50%;
  width: 0;
  top: 20%;
  position: absolute;
  right: 15px;
  overflow: hidden;
  border-right: solid 1px grey;
}
.jawBoneContainer .jawBoneCommon .simsLockup .meta {
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  height: auto;
  height: initial;
  line-height: initial;
  font-size: 1vw;
}
.jawBoneContainer .jawBoneCommon .simsLockup .meta .rating-wrapper {
  width: 100%;
  margin-bottom: 5px;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer .jawBoneCommon .simsLockup .meta {
    font-size: 1.3vw;
  }
  .jawBoneContainer .jawBoneCommon .simsLockup .meta .rating-wrapper {
    margin-bottom: 7px;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer .jawBoneCommon .simsLockup .meta {
    font-size: 1.1vw;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer .jawBoneCommon .simsLockup .meta {
    font-size: 0.9vw;
  }
}
.uhd-badge {
  border: 1px solid rgba(255, 255, 255, 0.4);
  color: rgba(255, 255, 255, 0.9);
  padding: 0 3px;
  line-height: 1.1;
  font-size: 0.8vw;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  margin-right: 0.333vw;
  margin-top: 0.2em;
  white-space: nowrap;
}
.jawBonePane .overview {
  width: 36vw;
  min-width: 330px;
  color: #999;
  line-height: 1.3;
  font-size: 1.5vw;
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBonePane .overview {
    font-size: 1.275vw;
  }
}
@media screen and (min-width: 1400px) {
  .jawBonePane .overview {
    font-size: 1.125vw;
  }
}
@media (max-width: 799px) {
  .jawBonePane .overview {
    font-size: 11px;
  }
}
.jawBoneCommon .jawBonePanes.fullBleed .overview .jawBonePane {
  color: #fff;
}
.jawBoneCommon .jawBonePanes.fullBleed .overview .jawBonePane .synopsis {
  color: #fff;
}
.jawBoneCommon .jawBonePanes.fullBleed .overview .meta {
  color: #fff;
}
.jawBoneCommon
  .jawBonePanes.fullBleed
  .overview
  .maturity-rating
  .maturity-number {
  border-color: #fff;
}
.jawBonePane .synopsis {
  margin: 0.8em 0 0 0;
}
@media (max-width: 799px) {
  .jawBonePane .synopsis {
    margin: 0.5em 0;
    width: 50vw;
  }
}
.jawBonePane .overview .supplemental-message {
  font-weight: 700;
  color: #eee;
  margin: 0.8em 0 0.6em 0;
}
.listMeta {
  margin: 0.8em 0;
  font-size: 0.9em;
}
@media (max-width: 799px) {
  .listMeta {
    margin: 0.5em 0;
  }
}
.listMeta p {
  margin: 0;
  padding: 0;
}
.listMeta a {
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.listMeta a:hover {
  text-decoration: underline;
}
.user-evidence {
  display: inline-block;
  margin: 0.2vw 0 0 0;
}
@media screen and (max-width: 499px) {
  .user-evidence {
    width: 50vw;
  }
}
.user-evidence .label {
  font-size: 16px;
}
.user-evidence ul {
  padding: 0;
  font-size: 0.8em;
  line-height: 1.2;
  margin: 0;
}
.user-evidence li {
  list-style: none;
  position: relative;
}
.user-evidence li img {
  width: 80px;
  height: 45px;
  float: left;
}
.user-evidence li p {
  padding: 0;
  display: table-cell;
  vertical-align: middle;
}
.user-evidence .hookIcon {
  speak: none;
  font-style: normal;
  font-weight: 400;
  font-variant: normal;
  font-size: 1.9em;
  text-transform: none;
  color: #666;
  padding: 1px 0.3em 0 0;
  display: table-cell;
}
.user-evidence .queued-evidence,
.user-evidence .rated-evidence,
.user-evidence .watched-evidence {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.user-evidence .queued-evidence img,
.user-evidence .rated-evidence img,
.user-evidence .watched-evidence img {
  padding: 0 0.7em 1px 0;
}
.overviewPlay {
  top: 45%;
  right: 26%;
  font-size: 7.2vw;
  height: 7.92vw;
  width: 7.92vw;
  margin-left: -3.78vw;
  margin-top: -3.78vw;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #fff;
  opacity: 0.7;
  position: absolute;
  z-index: 100;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: 0;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
}
.overviewPlay:focus,
.overviewPlay:hover {
  text-decoration: none;
  opacity: 1;
  -webkit-transform: scale(1.08, 1.08);
  -moz-transform: scale(1.08, 1.08);
  -ms-transform: scale(1.08, 1.08);
  -o-transform: scale(1.08, 1.08);
  transform: scale(1.08, 1.08);
}
.overviewPlay:focus .playRing,
.overviewPlay:hover .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.overviewPlay:focus .play,
.overviewPlay:hover .play {
  color: #e50914;
}
.overviewPlay .annotation {
  text-align: center;
  position: absolute;
  width: 200%;
  font-size: 18%;
  left: -50%;
  white-space: nowrap;
  bottom: -2.016vw;
  font-weight: 700;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
}
.overviewPlay .playRing {
  height: 7.2vw;
  width: 7.2vw;
  border: 0.36vw solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
}
.overviewPlay .playRing:after {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  content: "";
  position: absolute;
  z-index: -1;
  left: 0;
  height: 100%;
  width: 100%;
}
.overviewPlay .play {
  line-height: 7.2vw;
  width: 100%;
  color: #fff;
  font-size: 46%;
  left: 6%; /*!rtl:ignore*/
  text-align: center;
  position: absolute;
}
@media (max-width: 799px) {
  .overviewPlay .annotation {
    display: none;
  }
}
.watched {
  margin-top: 0.8em;
}
.watched .watchedTitle {
  color: #fff;
  font-weight: 700;
  font-size: 0.9em;
}
.watched .episodeTitle {
  font-size: 1.125vw;
}
.watched .episodeTitle b {
  color: #fff;
}
@media (max-width: 799px) {
  .watched .episodeTitle {
    width: 50vw;
  }
}
.watched .progress {
  font-size: 0.8em;
  width: 88%;
}
.watched .synopsis {
  margin: 0.8em 0;
}
.myListWrapper {
  clear: both;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
@media screen and (max-width: 499px) {
  .myListWrapper {
    display: none;
  }
}
.actionsRow {
  margin-top: 1.5vw;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.actionsRow .ratingCTA {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-self: center;
  -ms-flex-item-align: center;
  align-self: center;
  font-size: 1.1vw;
  margin-left: 0.6vw;
  margin-right: 1.7vw;
  font-weight: 700;
  vertical-align: middle;
  white-space: nowrap;
  color: #fff;
  position: relative;
}
.myListPrepromoMessage {
  font-size: 80%;
  margin: 10px 0;
}
.jaw-play-hitzone {
  position: absolute;
  right: 5%;
  top: -5vw;
  bottom: -6vw;
  width: 55%;
  z-index: 11;
  cursor: pointer;
}
.jawBoneContainer .global-supplemental-audio-toggle {
  position: absolute;
  right: 0;
  bottom: 0;
  padding: 0 20px 3em 0;
  z-index: 12;
  cursor: pointer;
  color: #fff;
  opacity: 1;
  -webkit-transition: opacity 0.3s cubic-bezier(0.5, 0, 0.1, 1),
    -webkit-transform 0.3s cubic-bezier(0.5, 0, 0.1, 1);
  transition: opacity 0.3s cubic-bezier(0.5, 0, 0.1, 1),
    -webkit-transform 0.3s cubic-bezier(0.5, 0, 0.1, 1);
  -o-transition: opacity 0.3s cubic-bezier(0.5, 0, 0.1, 1),
    -o-transform 0.3s cubic-bezier(0.5, 0, 0.1, 1);
  -moz-transition: transform 0.3s cubic-bezier(0.5, 0, 0.1, 1),
    opacity 0.3s cubic-bezier(0.5, 0, 0.1, 1),
    -moz-transform 0.3s cubic-bezier(0.5, 0, 0.1, 1);
  transition: transform 0.3s cubic-bezier(0.5, 0, 0.1, 1),
    opacity 0.3s cubic-bezier(0.5, 0, 0.1, 1);
  transition: transform 0.3s cubic-bezier(0.5, 0, 0.1, 1),
    opacity 0.3s cubic-bezier(0.5, 0, 0.1, 1),
    -webkit-transform 0.3s cubic-bezier(0.5, 0, 0.1, 1),
    -moz-transform 0.3s cubic-bezier(0.5, 0, 0.1, 1),
    -o-transform 0.3s cubic-bezier(0.5, 0, 0.1, 1);
}
.jawBoneContainer .global-supplemental-audio-toggle .nf-svg-button svg {
  width: 1.5em;
  height: 1.5em;
}
.jawBoneContainer .global-supplemental-audio-toggle .nf-svg-button.simpleround {
  border: 0.1em solid #fff;
  padding: 0.2em;
}
.jawBoneContainer .global-supplemental-audio-toggle.is-hidden {
  -webkit-transform: translateY(-10%);
  -moz-transform: translateY(-10%);
  -ms-transform: translateY(-10%);
  -o-transform: translateY(-10%);
  transform: translateY(-10%);
  pointer-events: none;
  opacity: 0;
}
.jawBonePane .overview {
  margin-top: 0.3em;
}
.jawBonePane .overview .jawbone-actions {
  margin: 0.8em 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.jawBonePane .overview .jawbone-actions .thumbs-container {
  margin: 0 0 0 0.8em;
  display: inline-block;
}
.jawBonePane .overview .evidence {
  margin: 15px 0 0 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  font-size: 0.9em;
}
.jawBonePane .overview .evidence .evidence-icon {
  font-size: 1.9em;
  color: #666;
  padding: 0 0.3em 1px 0;
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
}
.jawBonePane .overview .evidence .evidence-text {
  margin: 0;
  color: #828282;
}
.jawBonePane .overview .evidence .evidence-boxart {
  padding: 0 0.7em 1px 0;
}
.jawBonePane .overview .mylist-message {
  font-size: 0.8em;
}
.jawBonePane .overview .meta-lists {
  margin: 20px 0 0 0;
}
.jawBonePane .overview .inline-list {
  font-size: 0.9em;
  color: #828282;
  margin: 2px 0 0 0;
}
.jawBonePane .overview .inline-list .list-label {
  color: #828282;
  font-weight: 700;
  margin-right: 5px;
}
.jawBonePane .overview .inline-list a {
  color: #828282;
}
.jawBonePane .overview .inline-list a:hover {
  text-decoration: underline;
  color: #b3b3b3;
}
.episodeWrapper .slider .sliderMask .sliderContent {
  margin-right: -1px;
}
.episodeWrapper .indicator-icon {
  top: 24%;
}
.episodes-unavailable {
  text-align: center;
  padding-top: 8%;
  font-size: 2vw;
}
.jawBonePane .nfDropDown.theme-lakira .label {
  text-transform: none;
}
.jawBonePane .nfDropDown.theme-lakira .sub-menu.theme-lakira {
  font-size: 16px;
}
.jawBonePane .nfDropDown.theme-lakira .sub-menu.theme-lakira .sub-menu-link {
  padding: 2px 0;
}
.moreLikeLabel {
  font-size: 19px;
}
.simsWrapper {
  padding: 40px 0 0 0;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .simsWrapper {
    padding: 14px 0;
  }
}
.simsWrapper .indicator-icon {
  top: 32%;
}
.simsWrapper .maturity-rating .maturity-number {
  border: 1px solid rgba(255, 255, 255, 0.2);
  white-space: nowrap;
}
.simsWrapper .duration {
  white-space: nowrap;
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
}
.simsWrapper .simsSynopsis {
  color: #999;
}
.common-sense .common-sense-age {
  margin-left: 0.4em;
  color: #fff;
}
.common-sense .common-sense-title {
  margin-bottom: 0;
}
.common-sense .common-sense-copyright {
  margin-top: 0.3em;
  line-height: 1;
}
.common-sense .common-sense-icon {
  height: 24px;
  width: 27px;
  background-image: url(https://assets.nflxext.com/ffe/siteui/akira/JawBone/common_sense_icon.png);
  display: inline-block;
  vertical-align: middle;
  background-repeat: no-repeat;
}
.jawBoneContainer .jawBoneDetails {
  font-size: 14px;
  margin-top: 12px;
  white-space: nowrap;
}
.jawBoneContainer .jawBoneDetails .detailsItem {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 0 20px 0 0;
  height: auto;
  overflow: hidden;
  display: inline-block;
  vertical-align: top;
  white-space: normal;
  width: 50%;
}
@media screen and (max-width: 499px) {
  .jawBoneContainer .jawBoneDetails .detailsItem {
    width: 50%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .jawBoneContainer .jawBoneDetails .detailsItem {
    width: 33.333333%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer .jawBoneDetails .detailsItem {
    width: 25%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer .jawBoneDetails .detailsItem {
    width: 20%;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer .jawBoneDetails .detailsItem {
    width: 16.66666667%;
  }
}
.jawBoneContainer .jawBoneDetails .doubleWidth {
  width: 100%;
}
@media screen and (max-width: 499px) {
  .jawBoneContainer .jawBoneDetails .doubleWidth {
    width: 100%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .jawBoneContainer .jawBoneDetails .doubleWidth {
    width: 66.666666%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer .jawBoneDetails .doubleWidth {
    width: 50%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer .jawBoneDetails .doubleWidth {
    width: 40%;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer .jawBoneDetails .doubleWidth {
    width: 33.33333333%;
  }
}
.jawBoneContainer .jawBoneDetails .listLabel {
  font-size: 15px;
  margin: 0 0 5px;
  display: block;
  color: grey;
  font-weight: 700;
}
.jawBoneContainer .jawBoneDetails li.listLabel {
  margin-top: 14px;
}
.jawBoneContainer .jawBoneDetails li.listLabel:first-child {
  margin-top: 0;
}
.jawBoneContainer .jawBoneDetails ul {
  padding-left: 0;
  margin: 0 0 14px 0;
}
.jawBoneContainer .jawBoneDetails ul li {
  list-style: none;
}
.jawBoneContainer .jawBoneDetails .memberReview .readMoreLink,
.jawBoneContainer .jawBoneDetails .memberReviews .seeAllLink,
.jawBoneContainer .jawBoneDetails a {
  font-size: 14px;
  color: #fff;
  text-decoration: none;
}
.jawBoneContainer .jawBoneDetails .memberReview .readMoreLink:hover,
.jawBoneContainer .jawBoneDetails .memberReviews .seeAllLink:hover,
.jawBoneContainer .jawBoneDetails a:hover {
  text-decoration: underline;
  cursor: pointer;
}
.jawBoneContainer .jawBoneDetails .handle.active > .indicator-icon {
  display: block;
}
.jawBoneContainer .jawBoneDetails .handle:hover {
  text-decoration: none;
}
.jawBoneContainer .jawBoneDetails .maturity-rating {
  margin: 8px 0 4px;
}
.jawBoneContainer .jawBoneDetails .maturity-rating .maturity-number {
  background: #e5e5e5;
  padding: 2px 5px;
  color: #000;
  font-weight: 700;
  text-decoration: none;
}
.jawBoneContainer .jawBoneDetails .maturity-rating .maturity-number:hover {
  background: #fff;
}
.jawBoneContainer .jawBoneDetails .maturity-rating .maturity-custom-styling,
.jawBoneContainer .jawBoneDetails .maturity-rating .maturity-reason {
  color: #fff;
  font-size: 1.4em;
}
.jawBoneContainer .jawBoneDetails .dvd-availability {
  display: table-row;
}
.jawBoneContainer .jawBoneDetails .dvd-availability span {
  padding: 0 5px 14px 0;
  display: table-cell;
  vertical-align: middle;
}
.jawBoneContainer .jawBoneDetails .dvd-availability:hover {
  text-decoration: none;
}
.jawBoneContainer .jawBoneDetails .dvd-availability:hover .dvdAvailable,
.jawBoneContainer .jawBoneDetails .dvd-availability:hover .dvdSaveable {
  text-decoration: underline;
}
.jawBoneContainer .jawBoneDetails .noReviews {
  margin: 1em 0;
}
.jawBoneContainer .jawBoneDetails .noReviews .action {
  margin-top: 3px;
  cursor: pointer;
  color: #fff;
}
.jawBoneContainer .jawBoneDetails .noReviews .action:hover {
  text-decoration: underline;
}
.jawBoneContainer .jawBoneDetails .broadcaster {
  padding-top: 7px;
}
.jawBoneNavigations {
  position: absolute;
  left: 0;
  right: 0;
  margin: 0 2%;
  text-transform: uppercase;
  font-size: 1vw;
  font-weight: 700;
  letter-spacing: 1px;
  bottom: 0;
  height: 2em;
  color: #fff;
}
@media screen and (max-width: 499px) {
  .jawBoneNavigations {
    display: none;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .jawBoneNavigations {
    display: none;
  }
}
.jawBoneNavigations a {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  padding: 0.66em 0;
  cursor: pointer;
  z-index: 100;
}
.jawBoneNavigations a:hover {
  color: #e50914;
}
.jawBoneNavigations .previous {
  position: absolute;
  left: 0;
  bottom: 0;
}
.jawBoneNavigations .previous .caret {
  margin-right: 1vw;
}
.jawBoneNavigations .next {
  position: absolute;
  right: 0;
  bottom: 0;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: reverse;
  -webkit-flex-direction: row-reverse;
  -moz-box-orient: horizontal;
  -moz-box-direction: reverse;
  -ms-flex-direction: row-reverse;
  flex-direction: row-reverse;
}
.jawBoneNavigations .next .caret {
  margin-left: 1vw;
}
.jawBoneNavigations .caret {
  font-weight: 700;
  font-size: 1.5em;
  width: 1vw;
}
.jawBoneContainer .menu {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  text-transform: uppercase;
  width: 100%;
  font-size: 1vw;
  z-index: 100;
  padding: 0;
  margin: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  list-style: none;
  pointer-events: none;
}
.jawBoneContainer .menu.left-align {
  -webkit-box-pack: start;
  -webkit-justify-content: flex-start;
  -moz-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
  left: 4%;
}
.jawBoneContainer .menu.left-align li:first-child {
  padding-left: 0;
}
@media screen and (max-width: 499px) {
  .jawBoneContainer .menu {
    display: none;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .jawBoneContainer .menu {
    display: none;
  }
}
.jawBoneContainer .menu li {
  padding: 1em 1.5em 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  cursor: pointer;
  color: #ccc;
  min-width: 5%;
  pointer-events: auto;
}
.jawBoneContainer .menu li span {
  height: 0.33em;
  display: block;
  width: 100%;
  margin-top: 0.66em;
  -webkit-transform: translateY(0.4em);
  -moz-transform: translateY(0.4em);
  -ms-transform: translateY(0.4em);
  -o-transform: translateY(0.4em);
  transform: translateY(0.4em);
  -webkit-transition: -webkit-transform 0.2s linear;
  transition: -webkit-transform 0.2s linear;
  -o-transition: -o-transform 0.2s linear;
  -moz-transition: transform 0.2s linear, -moz-transform 0.2s linear;
  transition: transform 0.2s linear;
  transition: transform 0.2s linear, -webkit-transform 0.2s linear,
    -moz-transform 0.2s linear, -o-transform 0.2s linear;
}
.jawBoneContainer .menu li.current {
  cursor: default;
  color: #fff;
}
.jawBoneContainer .menu li.current span {
  -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
  background-color: #e50914;
}
.jawBoneContainer .menu li:hover {
  color: #fff;
}
.jawBoneContainer .menu a {
  margin: 0;
  padding: 0;
  letter-spacing: 1px;
  color: inherit;
  font-weight: 700;
  text-align: center;
  pointer-events: auto;
}
.jawbone-images {
  background: url(https://assets.nflxext.com/en_us/akira/jawBone/nav-shadow.png)
    no-repeat -9999px -9999px;
}
.jawBoneContent {
  background-color: #141414;
  position: absolute;
  left: 0;
  right: 0;
  margin-top: 2px;
  padding: 0;
}
.jawBoneContent .jawBoneOpenContainer {
  -webkit-transition: opacity 0.44s cubic-bezier(0.5, 0, 0.1, 1),
    -webkit-transform 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s;
  transition: opacity 0.44s cubic-bezier(0.5, 0, 0.1, 1),
    -webkit-transform 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s;
  -o-transition: opacity 0.44s cubic-bezier(0.5, 0, 0.1, 1),
    -o-transform 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s;
  -moz-transition: transform 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s,
    opacity 0.44s cubic-bezier(0.5, 0, 0.1, 1),
    -moz-transform 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s;
  transition: transform 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s,
    opacity 0.44s cubic-bezier(0.5, 0, 0.1, 1);
  transition: transform 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s,
    opacity 0.44s cubic-bezier(0.5, 0, 0.1, 1),
    -webkit-transform 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s,
    -moz-transform 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s,
    -o-transform 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s;
  opacity: 0;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}
.jawBoneContent .jawBoneOpenContainer .jawBoneFadeInPlaceContainer {
  -webkit-transition: opacity 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s;
  -o-transition: opacity 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s;
  -moz-transition: opacity 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s;
  transition: opacity 440ms cubic-bezier(0.5, 0, 0.1, 1) 0s;
  position: absolute;
  left: 0;
  right: 0;
}
.jawBoneContent.open .jawBoneOpenContainer {
  opacity: 1;
}
.jawBoneContainer {
  background-color: #000;
  position: relative;
  overflow: hidden;
  outline: 0;
  height: 37vw;
  -webkit-transition: height 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s,
    opacity 0.44s cubic-bezier(0.5, 0, 0.1, 1) 0.1s;
  -o-transition: height 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s,
    opacity 0.44s cubic-bezier(0.5, 0, 0.1, 1) 0.1s;
  -moz-transition: height 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s,
    opacity 0.44s cubic-bezier(0.5, 0, 0.1, 1) 0.1s;
  transition: height 0.54s cubic-bezier(0.5, 0, 0.1, 1) 0s,
    opacity 0.44s cubic-bezier(0.5, 0, 0.1, 1) 0.1s;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer {
    height: 42vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer {
    height: 37vw;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer {
    height: 32vw;
  }
}
.jawBoneContainer .background {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;
  overflow: hidden;
  -webkit-transition: opacity 0.3s cubic-bezier(0.5, 0, 0.1, 1) 0s;
  -o-transition: opacity 0.3s cubic-bezier(0.5, 0, 0.1, 1) 0s;
  -moz-transition: opacity 0.3s cubic-bezier(0.5, 0, 0.1, 1) 0s;
  transition: opacity 0.3s cubic-bezier(0.5, 0, 0.1, 1) 0s;
}
.jawBoneContainer .background.dim {
  opacity: 0.2;
}
.jawBoneContainer .background.fullbleed .vignette {
  opacity: 0.5;
}
.jawBoneContainer .background .vignette {
  background: #000;
  z-index: 2;
  width: 30%;
  position: absolute;
  top: 0;
  bottom: 0;
}
.jawBoneContainer .background .vignette::before {
  content: "";
  position: absolute;
  z-index: 10;
  background-image: -webkit-gradient(
    linear,
    left top,
    right top,
    from(#000),
    to(transparent)
  );
  background-image: -webkit-linear-gradient(left, #000, transparent);
  background-image: -moz-linear-gradient(left, #000, transparent);
  background-image: -o-linear-gradient(left, #000, transparent);
  background-image: linear-gradient(to right, #000, transparent);
  top: 0;
  bottom: 0;
  left: 100%;
  width: 275px;
}
.jawBoneContainer .background .fullbleed-bg {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background-position: center top;
  -moz-background-size: cover;
  background-size: cover;
}
.jawBoneContainer .background .nav-shadow {
  height: 114px;
  background: url(https://assets.nflxext.com/en_us/akira/jawBone/nav-shadow.png)
    no-repeat center 100%;
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 20;
  -moz-background-size: 100% 114px;
  background-size: 100% 114px;
}
.jawBoneContainer .background .nav-shadow.full-width {
  -moz-background-size: 200% 114px;
  background-size: 200% 114px;
}
.jawBoneContainer .jawBone {
  padding: 18px 0 12px 4%;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 10;
}
@media screen and (min-width: 1500px) {
  .jawBoneContainer .jawBone {
    padding-left: 60px;
  }
}
.jawBoneContainer .jawBoneBackground {
  right: 0;
  top: 0;
  bottom: 0;
  position: absolute;
  width: 70%;
}
.jawBoneContainer .jawBoneBackground .image-rotator-image {
  -webkit-transform: translateZ(0);
  background-position: center 10%;
}
.jawBoneContainer .close-button {
  position: absolute;
  right: 0;
  top: 0;
  font-size: 1.3vw;
  padding: 20px 20px 40px 40px;
  z-index: 12;
  cursor: pointer;
  color: #fff;
  -webkit-transform-origin: 60% 35%;
  -moz-transform-origin: 60% 35%;
  -ms-transform-origin: 60% 35%;
  -o-transform-origin: 60% 35%;
  transform-origin: 60% 35%;
  background: -webkit-radial-gradient(
    top right ellipse,
    rgba(0, 0, 0, 0.4) 0,
    rgba(0, 0, 0, 0) 70%,
    rgba(0, 0, 0, 0) 100%
  );
  background: -moz-radial-gradient(
    top right ellipse,
    rgba(0, 0, 0, 0.4) 0,
    rgba(0, 0, 0, 0) 70%,
    rgba(0, 0, 0, 0) 100%
  );
  background: -o-radial-gradient(
    top right ellipse,
    rgba(0, 0, 0, 0.4) 0,
    rgba(0, 0, 0, 0) 70%,
    rgba(0, 0, 0, 0) 100%
  );
  background: radial-gradient(
    ellipse at top right,
    rgba(0, 0, 0, 0.4) 0,
    rgba(0, 0, 0, 0) 70%,
    rgba(0, 0, 0, 0) 100%
  );
  background-position: 50% -50%;
}
@media screen and (max-width: 499px) {
  .jawBoneContainer .close-button {
    font-size: 1em;
  }
}
.jawBoneContainer h1,
.jawBoneContainer h3 {
  margin: 0;
  padding: 0;
  font-size: inherit;
}
.jawBoneContainer .jawbone-title-link:focus {
  outline: 0;
}
.jawBoneContainer .title {
  display: inline-block;
  position: relative;
  z-index: 1;
  line-height: 1.3;
  margin: 0 0 0.2em 0;
  font-weight: 700;
  color: #fff;
  font-size: 3vw;
  width: 670px;
}
.jawBoneContainer .title.original {
  height: 7vw;
}
.jawBoneContainer .title.original .text {
  position: absolute;
  bottom: 0;
}
.jawBoneContainer .title .logo {
  height: 7vw;
  -webkit-transform-origin: 0 0;
  -moz-transform-origin: 0 0;
  -ms-transform-origin: 0 0;
  -o-transform-origin: 0 0;
  transform-origin: 0 0;
  -webkit-transition: -webkit-transform 0.3s;
  transition: -webkit-transform 0.3s;
  -o-transition: -o-transform 0.3s;
  -moz-transition: transform 0.3s, -moz-transform 0.3s;
  transition: transform 0.3s;
  transition: transform 0.3s, -webkit-transform 0.3s, -moz-transform 0.3s,
    -o-transform 0.3s;
}
.jawBoneContainer .title .logo.small-logo {
  -webkit-transform: scale(0.7);
  -moz-transform: scale(0.7);
  -ms-transform: scale(0.7);
  -o-transform: scale(0.7);
  transform: scale(0.7);
}
.jawBoneContainer .title .logo.no-logo {
  -webkit-transform: scale(0);
  -moz-transform: scale(0);
  -ms-transform: scale(0);
  -o-transform: scale(0);
  transform: scale(0);
  height: 0;
}
@media screen and (max-width: 499px) {
  .jawBoneContainer .title {
    font-size: 14px;
    width: 55vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .jawBoneContainer .title {
    font-size: 14px;
    width: 55vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer .title {
    font-size: 3vw;
    width: 55vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer .title {
    font-size: 3vw;
    width: 50vw;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer .title {
    font-size: 2.4vw;
    width: 40vw;
  }
}
.jawBoneContainer .title.long-title-double-byte-width {
  width: 1005px;
}
@media screen and (max-width: 499px) {
  .jawBoneContainer .title.long-title-double-byte-width {
    width: 82.5vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .jawBoneContainer .title.long-title-double-byte-width {
    width: 82.5vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer .title.long-title-double-byte-width {
    width: 82.5vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer .title.long-title-double-byte-width {
    width: 75vw;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer .title.long-title-double-byte-width {
    width: 60vw;
  }
}
.jawBoneContainer .title.long-title-double-byte-font {
  font-size: 2.7vw;
}
@media screen and (max-width: 499px) {
  .jawBoneContainer .title.long-title-double-byte-font {
    font-size: 12.6px;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .jawBoneContainer .title.long-title-double-byte-font {
    font-size: 12.6px;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer .title.long-title-double-byte-font {
    font-size: 2.7vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer .title.long-title-double-byte-font {
    font-size: 2.7vw;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer .title.long-title-double-byte-font {
    font-size: 2.16vw;
  }
}
.jawBoneContainer .title.title-small {
  font-size: 2.5vw;
}
@media screen and (max-width: 499px) {
  .jawBoneContainer .title.title-small {
    font-size: 14px;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .jawBoneContainer .title.title-small {
    font-size: 14px;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer .title.title-small {
    font-size: 2.5vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer .title.title-small {
    font-size: 2.5vw;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer .title.title-small {
    font-size: 2vw;
  }
}
.jawBoneContainer .title.title-small.long-title-double-byte-width {
  width: 1005px;
}
@media screen and (max-width: 499px) {
  .jawBoneContainer .title.title-small.long-title-double-byte-width {
    width: 82.5vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .jawBoneContainer .title.title-small.long-title-double-byte-width {
    width: 82.5vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer .title.title-small.long-title-double-byte-width {
    width: 82.5vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer .title.title-small.long-title-double-byte-width {
    width: 75vw;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer .title.title-small.long-title-double-byte-width {
    width: 60vw;
  }
}
.jawBoneContainer .title.title-small.long-title-double-byte-font {
  font-size: 2.25vw;
}
@media screen and (max-width: 499px) {
  .jawBoneContainer .title.title-small.long-title-double-byte-font {
    font-size: 12.6px;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .jawBoneContainer .title.title-small.long-title-double-byte-font {
    font-size: 12.6px;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer .title.title-small.long-title-double-byte-font {
    font-size: 2.25vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer .title.title-small.long-title-double-byte-font {
    font-size: 2.25vw;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer .title.title-small.long-title-double-byte-font {
    font-size: 1.8vw;
  }
}
.jawBoneContainer .jawBoneCommon {
  display: inline-block;
  margin-bottom: 20px;
  width: 100%;
  height: 33.3vw;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .jawBoneContainer .jawBoneCommon {
    height: 37.8vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .jawBoneContainer .jawBoneCommon {
    height: 33.3vw;
  }
}
@media screen and (min-width: 1400px) {
  .jawBoneContainer .jawBoneCommon {
    height: 28.8vw;
  }
}
.jawBoneContainer .jawBoneCommon .meta {
  position: relative;
  z-index: 2;
  color: #fff;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  font-size: 1.1vw;
  height: 1.1vw;
  min-height: 1.1vw;
  line-height: 1.1vw;
  margin-bottom: 0.8em;
}
@media (max-width: 799px) {
  .jawBoneContainer .jawBoneCommon .meta {
    font-size: 10px;
    height: 10px;
    min-height: 10px;
    line-height: 10px;
  }
}
.jawBoneContainer .jawBoneCommon .meta > span {
  margin-right: 0.5em;
  font-weight: 700;
}
.jawBoneContainer .jawBoneCommon .meta > .rating-wrapper {
  margin-right: 0;
}
.jawBoneContainer .jawBoneCommon .meta .rating-inner {
  height: 1.3vw;
  line-height: 1.3vw;
}
@media (max-width: 799px) {
  .jawBoneContainer .jawBoneCommon .meta .rating-inner {
    height: 10px;
    line-height: 10px;
  }
}
.jawBoneContainer .jawBoneCommon .meta .starbar {
  font-size: 0.8em;
  display: -webkit-inline-box;
  display: -webkit-inline-flex;
  display: -moz-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
}
.jawBoneContainer .jawBonePanes {
  position: relative;
  opacity: 1;
  z-index: 2;
  -webkit-transition: -webkit-transform 0.3s;
  transition: -webkit-transform 0.3s;
  -o-transition: -o-transform 0.3s;
  -moz-transition: transform 0.3s, -moz-transform 0.3s;
  transition: transform 0.3s;
  transition: transform 0.3s, -webkit-transform 0.3s, -moz-transform 0.3s,
    -o-transform 0.3s;
}
.jawBoneContainer .jawBonePanes.offset-for-logo {
  -webkit-transform: translate(0, -2.3vw);
  -moz-transform: translate(0, -2.3vw);
  -ms-transform: translate(0, -2.3vw);
  -o-transform: translate(0, -2.3vw);
  transform: translate(0, -2.3vw);
}
.jawBoneContainer .jawBonePanes .jawBonePane {
  position: absolute;
  top: 0;
  width: 100%;
  color: grey;
  opacity: 0;
}
.jawBoneContainer .jawBonePanes .jawBonePane:focus {
  outline: 0;
}
.jawBoneContainer .jawBonePanes .jawBonePane .nfDropDown.theme-lakira {
  min-width: 160px;
  top: 0;
  text-transform: none;
  z-index: 3;
  margin: 12px 0;
}
.jawBoneContainer
  .jawBonePanes
  .jawBonePane
  .nfDropDown.theme-lakira
  .sub-menu.theme-lakira {
  font-size: 16px;
  padding-left: 0;
  max-height: 20vw;
}
.jawBoneContainer
  .jawBonePanes
  .jawBonePane
  .nfDropDown.theme-lakira
  .sub-menu.theme-lakira
  .sub-menu-item {
  padding-left: 10px;
}
.jawBoneContainer .jawBonePanes .jawBonePane .unavailable {
  margin-top: 150px;
  text-align: center;
}
.jawBoneContainer .slider {
  overflow-y: hidden;
  margin-left: -4%;
}
@media screen and (min-width: 1500px) {
  .jawBoneContainer .slider {
    margin-left: -60px;
  }
}
.jawBoneContainer .slider .sliderMask {
  overflow-y: hidden;
}
.jawBoneContainer .episodeWrapper .slider .sliderMask,
.jawBoneContainer .simsWrapper .slider .sliderMask,
.jawBoneContainer .trailerWrapper .slider .sliderMask {
  margin-right: -30px;
}
.jawBoneContainer .episodeWrapper .slider .handle.active > .indicator-icon,
.jawBoneContainer .simsWrapper .slider .handle.active > .indicator-icon,
.jawBoneContainer .trailerWrapper .slider .handle.active > .indicator-icon {
  display: block;
}
.trailerWrapper {
  margin-top: 40px;
}
@media screen and (max-width: 499px) {
  .episodeWrapper .loadingTitle,
  .episodeWrapper .row-with-x-columns .slider-item,
  .placeholderEpisodes .loadingTitle,
  .placeholderEpisodes .row-with-x-columns .slider-item,
  .simsWrapper .loadingTitle,
  .simsWrapper .row-with-x-columns .slider-item,
  .trailerWrapper .loadingTitle,
  .trailerWrapper .row-with-x-columns .slider-item {
    width: 100%;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .episodeWrapper .loadingTitle,
  .episodeWrapper .row-with-x-columns .slider-item,
  .placeholderEpisodes .loadingTitle,
  .placeholderEpisodes .row-with-x-columns .slider-item,
  .simsWrapper .loadingTitle,
  .simsWrapper .row-with-x-columns .slider-item,
  .trailerWrapper .loadingTitle,
  .trailerWrapper .row-with-x-columns .slider-item {
    width: 50%;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .episodeWrapper .loadingTitle,
  .episodeWrapper .row-with-x-columns .slider-item,
  .placeholderEpisodes .loadingTitle,
  .placeholderEpisodes .row-with-x-columns .slider-item,
  .simsWrapper .loadingTitle,
  .simsWrapper .row-with-x-columns .slider-item,
  .trailerWrapper .loadingTitle,
  .trailerWrapper .row-with-x-columns .slider-item {
    width: 33.333333%;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .episodeWrapper .loadingTitle,
  .episodeWrapper .row-with-x-columns .slider-item,
  .placeholderEpisodes .loadingTitle,
  .placeholderEpisodes .row-with-x-columns .slider-item,
  .simsWrapper .loadingTitle,
  .simsWrapper .row-with-x-columns .slider-item,
  .trailerWrapper .loadingTitle,
  .trailerWrapper .row-with-x-columns .slider-item {
    width: 25%;
  }
}
@media screen and (min-width: 1400px) {
  .episodeWrapper .loadingTitle,
  .episodeWrapper .row-with-x-columns .slider-item,
  .placeholderEpisodes .loadingTitle,
  .placeholderEpisodes .row-with-x-columns .slider-item,
  .simsWrapper .loadingTitle,
  .simsWrapper .row-with-x-columns .slider-item,
  .trailerWrapper .loadingTitle,
  .trailerWrapper .row-with-x-columns .slider-item {
    width: 20%;
  }
}
.jawBoneOpenContainer.jawBoneOpen-enter,
.jawBoneOpenContainer.jawBoneOpen-leave.jawBoneOpen-leave-active {
  -webkit-transform: translateY(-80px);
  -moz-transform: translateY(-80px);
  -ms-transform: translateY(-80px);
  -o-transform: translateY(-80px);
  transform: translateY(-80px);
}
.jawBoneOpenContainer.jawBoneOpen-enter .jawBoneContainer,
.jawBoneOpenContainer.jawBoneOpen-leave.jawBoneOpen-leave-active
  .jawBoneContainer {
  opacity: 0;
}
.jawBoneOpenContainer.jawBoneOpen-enter.jawBoneOpen-enter-active,
.jawBoneOpenContainer.jawBoneOpen-leave {
  -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
}
.jawBoneOpenContainer.jawBoneOpen-enter.jawBoneOpen-enter-active
  .jawBoneContainer,
.jawBoneOpenContainer.jawBoneOpen-leave .jawBoneContainer {
  opacity: 1;
}
.jawBoneFadeInPlaceContainer.jawBoneFadeInPlace-enter.jawBoneFadeInPlace-enter-active,
.jawBoneFadeInPlaceContainer.jawBoneFadeInPlace-leave {
  opacity: 1;
  z-index: 1;
}
.jawBoneFadeInPlaceContainer.jawBoneFadeInPlace-enter,
.jawBoneFadeInPlaceContainer.jawBoneFadeInPlace-leave.jawBoneFadeInPlace-leave-active {
  opacity: 0;
  z-index: 0;
}
.extended-diacritics-language .jawBoneContainer .jawBoneCommon {
  height: 1.4vw;
}
@media (max-width: 799px) {
  .extended-diacritics-language .jawBoneContainer .jawBoneCommon {
    height: 12px;
  }
}
.extended-diacritics-language
  .jawBoneContainer
  .jawBoneCommon
  .simsLockup
  .meta {
  line-height: 1.4;
}
.extended-diacritics-language
  .jawBoneContainer
  .jawBoneCommon
  .meta
  .rating-inner {
  height: 1.4vw;
  line-height: 1.4vw;
}
@media (max-width: 799px) {
  .extended-diacritics-language
    .jawBoneContainer
    .jawBoneCommon
    .meta
    .rating-inner {
    height: 12px;
    line-height: 12px;
  }
}
.extended-diacritics-language .jawBoneContainer .jawBoneCommon .meta > span {
  line-height: 1.4;
}
.extended-diacritics-language .jawBoneContainer .title {
  line-height: 1.4;
}
.rowListContainer .galleryHeader {
  padding: 36px 0 36px 0;
  min-height: 44px;
  margin: 0 4%;
}
@media screen and (min-width: 1500px) {
  .rowListContainer .galleryHeader {
    margin: 0 60px;
  }
}
.rowListContainer .galleryHeader .title {
  font-size: 30px;
}
.rowListContainer .rowListMessage {
  color: #666;
  text-align: center;
  padding-top: 100px;
  font-size: 18px;
}
.rowListContainer .rowListSpinLoader {
  text-align: center;
  padding-top: 100px;
}
.rowList {
  padding: 0 4%;
}
.rowList .placeholder {
  background: #202020;
  height: 4vw;
}
.rowList .rowListItem {
  cursor: pointer;
  cursor: -webkit-grab;
  cursor: -moz-grab;
  cursor: grab;
  border-top: 1px solid #313131;
  border-bottom: 1px solid #313131;
  padding: 0.2% 0;
  -webkit-box-pack: start;
  -webkit-justify-content: flex-start;
  -moz-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-bottom: -1px;
  height: 4vw;
}
.rowList .rowListItem .video-artwork {
  position: relative;
}
.rowList .rowListItem:hover {
  background-color: #202020;
}
.rowList .rowListItem:hover .first-move-grips,
.rowList .rowListItem:hover .last-move-grips,
.rowList .rowListItem:hover .move-to-top,
.rowList .rowListItem:hover .remove {
  opacity: 1;
}
.rowList .rowListItem:hover .tinyTinyCard .playLink {
  display: block;
}
.rowList .rowListItem .first-move-grips,
.rowList .rowListItem .last-move-grips {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 1.2%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 1.2%;
  flex: 0 0 1.2%;
  opacity: 0;
  color: #999;
}
.rowList .rowListItem .first-move-grips:hover,
.rowList .rowListItem .last-move-grips:hover {
  color: #fff;
}
.rowList .rowListItem .last-move-grips {
  text-align: right;
}
.rowList .rowListItem .tinyTinyCard {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 8%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 8%;
  flex: 0 0 8%;
  margin-right: 1.5%;
}
.rowList .rowListItem .tinyTinyCard .playLink {
  display: none;
  left: 50%;
  top: 50%;
  font-size: 2.5vw;
  height: 2.75vw;
  width: 2.75vw;
  margin-left: -1.3125vw;
  margin-top: -1.3125vw;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #fff;
  opacity: 0.7;
  position: absolute;
  z-index: 100;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: 0;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
}
.rowList .rowListItem .tinyTinyCard .playLink:focus,
.rowList .rowListItem .tinyTinyCard .playLink:hover {
  text-decoration: none;
  opacity: 1;
  -webkit-transform: scale(1.08, 1.08);
  -moz-transform: scale(1.08, 1.08);
  -ms-transform: scale(1.08, 1.08);
  -o-transform: scale(1.08, 1.08);
  transform: scale(1.08, 1.08);
}
.rowList .rowListItem .tinyTinyCard .playLink:focus .playRing,
.rowList .rowListItem .tinyTinyCard .playLink:hover .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.rowList .rowListItem .tinyTinyCard .playLink:focus .play,
.rowList .rowListItem .tinyTinyCard .playLink:hover .play {
  color: #e50914;
}
.rowList .rowListItem .tinyTinyCard .playLink .annotation {
  text-align: center;
  position: absolute;
  width: 200%;
  font-size: 18%;
  left: -50%;
  white-space: nowrap;
  bottom: -0.7vw;
  font-weight: 700;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
}
.rowList .rowListItem .tinyTinyCard .playLink .playRing {
  height: 2.5vw;
  width: 2.5vw;
  border: 0.125vw solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
}
.rowList .rowListItem .tinyTinyCard .playLink .playRing:after {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  content: "";
  position: absolute;
  z-index: -1;
  left: 0;
  height: 100%;
  width: 100%;
}
.rowList .rowListItem .tinyTinyCard .playLink .play {
  line-height: 2.5vw;
  width: 100%;
  color: #fff;
  font-size: 46%;
  left: 6%; /*!rtl:ignore*/
  text-align: center;
  position: absolute;
}
.rowList .rowListItem .tinyTinyCard .playLink .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.rowList .rowListItem .title {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 25%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 25%;
  flex: 0 0 25%;
  font-weight: 700;
}
.rowList .rowListItem .title a:hover {
  text-decoration: underline;
}
.rowList .rowListItem .starbar {
  font-size: 0.8vw;
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 5%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 5%;
  flex: 0 0 5%;
  text-align: left;
  margin-right: 2.5%;
}
.rowList .rowListItem .match-score,
.rowList .rowListItem .meta-thumb-container {
  display: none;
}
.rowList .rowListItem .year {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 5%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 5%;
  flex: 0 0 5%;
  font-weight: 700;
}
.rowList .rowListItem .maturity-rating {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 7%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 7%;
  flex: 0 0 7%;
}
.rowList .rowListItem .duration {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 8%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 8%;
  flex: 0 0 8%;
  font-weight: 700;
}
.rowList .rowListItem .notes {
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 auto;
  -moz-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  font-size: 0.9em;
}
.rowList .rowListItem .move-to-top {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 8.5%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 8.5%;
  flex: 0 0 8.5%;
  font-size: 0.9em;
  font-weight: 700;
  opacity: 0;
}
.rowList .rowListItem .move-to-top a {
  color: #999;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.rowList .rowListItem .move-to-top a:hover {
  color: #fff;
}
.rowList .rowListItem .move-to-top a .svg-icon-moveToTop {
  width: 1.3vw;
  height: 3vw;
  margin-right: 6%;
}
.rowList .rowListItem .remove {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 3%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 3%;
  flex: 0 0 3%;
  font-size: 1.3em;
  opacity: 0;
}
.rowList .rowListItem .remove a {
  color: #999;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.rowList .rowListItem .remove a:hover {
  stroke: #fff;
}
.rowList .rowListItem .remove a .svg-icon-close {
  padding: 3px;
  width: 0.8vw;
  height: 0.8vw;
  stroke-width: 2px;
  stroke-linejoin: miter;
}
.rowList .rowListItem .svg-icon-grips {
  width: 0.6vw;
  height: 2.5vw;
}
.ui-binary-input {
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding-left: 36px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  font-size: 16px;
}
.ui-binary-input input:disabled ~ .helper,
.ui-binary-input input[type="checkbox"]:disabled + label,
.ui-binary-input input[type="radio"]:disabled + label {
  color: #b3b3b3;
}
.ui-binary-input .helper {
  font-size: 14px;
  line-height: 1.3em;
  color: grey;
}
.ui-binary-input.error > .helper {
  color: #b00500;
}
.ui-binary-input input[type="checkbox"],
.ui-binary-input input[type="radio"] {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.ui-binary-input input[type="checkbox"]:focus + label::before,
.ui-binary-input input[type="radio"]:focus + label::before {
  -webkit-box-shadow: 0 0 5px 2px rgba(150, 200, 255, 0.6);
  -moz-box-shadow: 0 0 5px 2px rgba(150, 200, 255, 0.6);
  box-shadow: 0 0 5px 2px rgba(150, 200, 255, 0.6);
  border-color: grey;
}
.ui-binary-input input[type="checkbox"] + label,
.ui-binary-input input[type="radio"] + label {
  color: #333;
  position: relative;
  display: block;
  line-height: 1.2;
  padding: 6px 0;
}
.ui-binary-input input[type="checkbox"] + label:before,
.ui-binary-input input[type="radio"] + label:before {
  content: "";
  position: absolute;
  display: block;
  top: 2px;
  left: -36px;
  padding: 0;
  border: 1px solid #b3b3b3;
  background-color: #fff;
}
.ui-binary-input input[type="checkbox"] + label:after,
.ui-binary-input input[type="radio"] + label:after {
  position: absolute;
}
.ui-binary-input input[type="checkbox"] + label:before {
  width: 25px;
  height: 25px;
}
.ui-binary-input input[type="checkbox"]:checked + label:after {
  color: #0080ff;
  content: "\e804";
  top: -2px;
  left: -36px;
  font-family: nf-icon;
  font-size: 28px;
}
.ui-binary-input input[type="radio"] + label:before {
  width: 25px;
  height: 25px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
}
.ui-binary-input input[type="radio"]:checked + label:after {
  content: "";
  top: 8px;
  left: -30px;
  width: 15px;
  height: 15px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  background-color: #0080ff;
}
.ui-binary-input.error input[type="checkbox"] + label:before,
.ui-binary-input.error input[type="radio"] + label:before {
  border-color: #b00500;
}
.memberReview {
  margin: 1em 0;
}
.memberReview .starbar {
  margin: 0 0 0.5em;
}
.memberReview .reviewText {
  overflow-wrap: break-word;
  word-wrap: break-word;
}
.memberReview .readMoreLink {
  white-space: nowrap;
}
.memberReview .helpfulCount,
.memberReview .voteReview {
  font-size: 0.85em;
  margin: 1em 0;
}
.memberReview .action {
  cursor: pointer;
  color: #fff;
}
.memberReview .action.selected {
  cursor: default;
  color: #c01c00;
}
.writeReviewForm {
  position: relative;
}
.writeReviewForm .rating {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.writeReviewForm .rating .starbar {
  margin-left: 0.5em;
  margin-bottom: 1em;
}
.writeReviewForm .rating .starbar .sb-placeholder {
  color: #4d4d4d;
}
.writeReviewForm .error {
  color: #b00500;
}
.writeReviewForm .reviewText {
  width: 100%;
  max-width: 100%;
  height: 5em;
  margin: 0;
  background-color: transparent;
  border: solid 2px #333;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.writeReviewForm .buttons {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: baseline;
  -webkit-align-items: baseline;
  -moz-box-align: baseline;
  -ms-flex-align: baseline;
  align-items: baseline;
  -webkit-flex-wrap: wrap-reverse;
  -ms-flex-wrap: wrap-reverse;
  flex-wrap: wrap-reverse;
}
.writeReviewForm .buttons button {
  margin-top: 1em;
  margin-right: 1em;
}
.writeReviewForm .buttons .spacer {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
.writeReviewForm .buttons .faq {
  color: grey;
}
.writeReviewForm .buttons .faq a {
  color: #fff;
}
.writeReviewForm .writeReviewSavingMask {
  display: none;
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 10;
  background-color: #000;
  opacity: 0.9;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.writeReviewForm .writeReviewSavingMask .akira-spinner {
  font-size: 2.5em;
}
.writeReviewForm.saving .writeReviewSavingMask {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.writeReviewSuccess .heading {
  margin: 0.25em 0;
}
.writeReviewSuccess .details {
  color: grey;
}
.nf-modal {
  font-size: 16px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  height: 100vh;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 20000;
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
}
@media screen and (min-width: 1280px) {
  .nf-modal {
    font-size: 1.25vw;
  }
}
@media screen and (min-width: 2560px) {
  .nf-modal {
    font-size: 32px;
  }
}
.nf-modal .nf-modal-background {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.9);
  z-index: -1;
}
.nf-modal .nf-modal-content {
  width: 100%;
  height: 100vh;
  border-top: solid 4px #b9090b;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
@media screen and (min-width: 500px) {
  .nf-modal .nf-modal-content {
    width: 50%;
    height: auto;
    min-width: 500px;
    max-width: 1280px;
    min-height: 10vh;
    max-height: 70vh;
  }
}
.nf-modal-content-wrapper {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
@media screen and (min-width: 500px) {
  .nf-modal-content-wrapper {
    min-height: 10vh;
    max-height: 70vh;
  }
}
.nf-modal-content-wrapper .nf-modal-dismiss,
.nf-modal-content-wrapper .nf-modal-footer,
.nf-modal-content-wrapper .nf-modal-header {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
  -webkit-flex-basis: auto;
  -ms-flex-preferred-size: auto;
  flex-basis: auto;
  height: auto;
}
.nf-modal-content-wrapper .nf-modal-header {
  padding: 0 15px;
}
.nf-modal-content-wrapper .nf-modal-body {
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 auto;
  -moz-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  overflow-y: auto;
  overflow-x: hidden;
  padding: 0 15px;
}
.nf-modal-content-wrapper .nf-modal-footer {
  padding: 0 15px;
}
.nf-modal-content-wrapper .nf-modal-dismiss {
  text-align: right;
  text-align: end;
  min-height: 0.5em;
}
.nf-modal-content-wrapper .nf-modal-dismiss .nf-modal-dismiss-btn {
  border: none;
  background: 0 0;
  font-size: 1.2em;
  padding: 0.5em 0.5em 0 0.5em;
}
.nf-modal-content-wrapper .nf-modal-dismiss .nf-modal-dismiss-btn:focus {
  outline: auto;
}
.nf-modal-content-wrapper .nf-modal-header .nf-modal-heading {
  margin-top: 0;
}
.nf-modal-content-wrapper .nf-modal-footer .nf-modal-button-bar {
  padding: 15px 0;
}
.nf-modal-content-wrapper .nf-modal-hr {
  display: block;
  height: 1px;
  border: 0;
  border-top: 1px solid #333;
  margin: 0;
  padding: 0;
}
.modal-appear,
.modal-enter {
  opacity: 0.01;
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
  -webkit-transition-property: opacity, -webkit-transform;
  transition-property: opacity, -webkit-transform;
  -o-transition-property: opacity, -o-transform;
  -moz-transition-property: opacity, transform, -moz-transform;
  transition-property: opacity, transform;
  transition-property: opacity, transform, -webkit-transform, -moz-transform,
    -o-transform;
  -webkit-transition-duration: 450ms;
  -moz-transition-duration: 450ms;
  -o-transition-duration: 450ms;
  transition-duration: 450ms;
}
.modal-appear.modal-appear-active,
.modal-enter.modal-enter-active {
  opacity: 1;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.nf-modal.rating-modal .nf-modal-content {
  border-top: 0;
  width: 65%;
  max-height: none;
}
.nf-modal.rating-modal .nf-modal-content .nf-modal-content-wrapper {
  max-height: none;
}
.nf-modal.rating-modal .nf-modal-hr {
  display: none;
}
.nf-modal.rating-modal .nf-modal-body {
  overflow: hidden;
}
.rating {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.rating-overlay {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.rating-description {
  color: #b3b3b3;
  border-top: solid 2px #b9090b;
  margin-top: 1em;
  width: 100%;
  padding-bottom: 5px;
}
.rating-description h2 {
  margin: 0;
  font-size: 1.9em;
  line-height: 1.1;
  color: #fff;
  padding-top: 4%;
}
.rating-description p {
  margin: 0.5em 0 60px 0;
}
.rating-description .rating-portion {
  padding-left: 3.5em;
}
.rating-description .rating-headline-body {
  font-size: 1.6em;
}
.rating-description h3 {
  position: relative;
  color: #fff;
  margin: 0;
}
.rating-description .thumb {
  width: 1em;
  height: 1em;
  position: absolute;
  left: -3em;
  border: 1px solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  padding: 10px;
}
.extended-diacritics-language .rating-description h2 {
  line-height: 1.3;
}
@media screen and (max-width: 1000px) {
  .nf-modal.rating-modal .nf-modal-content {
    width: 75%;
  }
}
@media screen and (max-width: 600px) {
  .rating-overlay {
    -webkit-box-orient: vertical;
    -webkit-box-direction: reverse;
    -webkit-flex-direction: column-reverse;
    -moz-box-orient: vertical;
    -moz-box-direction: reverse;
    -ms-flex-direction: column-reverse;
    flex-direction: column-reverse;
  }
  .rating-description {
    border-left: 0;
    padding: 0 0 8% 0;
    margin: 0 0 8% 0;
    border-bottom: 1px solid #333;
    text-align: center;
  }
  .rating-welcome-description {
    border-top: 0;
  }
  .nf-modal.rating-modal .nf-modal-content {
    border-top: solid 4px #b9090b;
    width: 100%;
  }
}
@media screen and (min-aspect-ratio: 5/2) {
  .rating-details {
    margin-bottom: 2%;
    font-size: 0.7em;
  }
  .rating-header {
    margin: 0.3em 0;
    font-size: 1em;
  }
  .rating-description .rating-headline-body,
  .rating-description h2 {
    font-size: 1.3em;
  }
}
.inappropriate-review {
  border: 0;
  border-bottom: solid 1px #333;
  margin: 1.5em 0;
  padding: 0 0 1em;
}
.inappropriate-review .akira-button {
  margin: 0.5em 0.5em 0 0;
}
.inappropriate-review-legend {
  font-weight: 700;
  color: #fff;
  margin-bottom: 0.5em;
}
.inappropriate-review-types {
  list-style-type: none;
  padding: 0;
}
.inappropriate-review-types .akira-checkbox-item {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  margin-top: 0.5em;
}
.inappropriate-review-types .akira-checkbox-label {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.inappropriate-review-types .akira-checkbox-label:before {
  content: "";
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  font-size: 1.5em;
  width: 0.7em;
  height: 0.7em;
  min-width: 0.7em;
  border: 0.1em solid #333;
  padding: 0;
  margin-right: 0.3em;
  background-color: #000;
  font-family: nf-icon;
  color: #c01c00;
}
.inappropriate-review-types .akira-checkbox {
  display: none;
}
.inappropriate-review-types
  .akira-checkbox:checked
  + .akira-checkbox-label:before {
  content: "\e804";
}
.voteReview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}
.voteReview .action {
  padding: 0 1em;
}
.voteReview .akira-radio-item + .akira-radio-item,
.voteReview .inappropriateTrigger {
  border-left: solid 1px grey;
}
.voteReview .reviewActions {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.voteReview .voteReviewChoices {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  padding: 0;
  margin: 0;
}
.voteReview .voteReviewChoices .akira-radio-item {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.voteReview .voteReviewChoices .akira-radio {
  display: none;
}
.voteReview .voteReviewChoices .akira-radio:checked + .akira-radio-label {
  color: #c01c00;
  cursor: default;
}
@media screen and (min-width: 500px) {
  .reviews-modal .nf-modal-content {
    width: 75%;
  }
}
.reviews-modal:not(.write-first-review) .nf-modal-content-wrapper {
  height: 70vh;
}
.reviews-modal .reviewsModalHeader {
  margin-bottom: 2em;
}
.reviews-modal .reviewsModalBody h3 {
  margin: 2em 0 1em;
}
.reviews-modal .reviewsModalBody .memberReviews {
  list-style-type: none;
  padding-left: 0;
  margin: 0;
  color: grey;
}
.reviews-modal .reviewsModalBody .memberReviews .memberReview {
  margin: 1em 0 2em;
}
.payment-hold-modal {
  text-align: center;
}
.payment-hold-modal .nf-modal-hr {
  display: none;
}
.payment-hold-modal .nf-modal-heading {
  font-size: 1.8em;
  margin: 0;
}
.payment-hold-modal .nf-modal-body {
  margin-bottom: 1.5em;
  padding: 0 1.5em;
  overflow: visible;
}
.payment-hold-modal .nf-modal-footer {
  border-bottom: 1px solid #333;
  border-top: 1px solid #333;
  padding: 1.5em 0;
}
.payment-hold-modal .simple-notification {
  top: 0;
}
.payment-hold-body {
  margin: 1.2em 0;
}
.payment-hold-footer {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  padding: 0 1.5em;
  text-align: left;
}
@media screen and (max-width: 800px) {
  .payment-hold-footer {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -moz-box-orient: vertical;
    -moz-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    text-align: center;
  }
}
.payment-hold-tease {
  margin: 0 0 0 1.5em;
  color: #b3b3b3;
}
@media screen and (max-width: 800px) {
  .payment-hold-tease {
    margin: 1em 0 0 0;
  }
}
.show-all-plans {
  display: block;
  margin-top: 20px;
  text-decoration: underline;
  cursor: pointer;
}
.plan-list {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  text-align: center;
  margin-bottom: 15px;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
@media only screen and (min-width: 500px) {
  .plan-list {
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -webkit-flex-direction: row;
    -moz-box-orient: horizontal;
    -moz-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
  }
}
.plan-list .plan-icon-container {
  width: 22px;
  height: 22px;
  -webkit-align-self: center;
  -ms-flex-item-align: center;
  -ms-grid-row-align: center;
  align-self: center;
}
.plan-list .plan-name-container {
  margin-left: 15px;
  text-align: left;
}
@media only screen and (min-width: 500px) {
  .plan-list .plan-name-container {
    margin-left: 0;
    margin-top: 10px;
    text-align: center;
  }
}
.plan-list .plan-element-container {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  background-color: #333;
  margin: 0 3px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-pack: initial;
  -webkit-justify-content: initial;
  -moz-box-pack: initial;
  -ms-flex-pack: initial;
  justify-content: initial;
  padding: 5px 10px 10px;
  cursor: pointer;
  word-break: break-word;
  overflow: hidden;
}
@media only screen and (min-width: 500px) {
  .plan-list .plan-element-container {
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -moz-box-orient: vertical;
    -moz-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -moz-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 20px 10px 30px;
  }
}
.plan-list .plan-element-container .plan-name {
  text-transform: uppercase;
  margin-top: 5px;
}
.plan-list .plan-element-container .plan-price {
  margin-top: 10px;
}
.plan-list .plan-element-container.selected,
.plan-list .plan-element-container:hover {
  background-color: #4d4d4d;
}
.plan-video-artwork-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.plan-video-artwork {
  height: 50px;
  margin: 0 3px;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
}
@media only screen and (min-width: 500px) {
  .plan-video-artwork {
    height: 100px;
  }
}
.plan-video-artwork-ph {
  width: 100px;
  margin: 0 5px;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: -webkit-gradient(
    linear,
    right top,
    left top,
    from(#333),
    to(#000)
  );
  background: -webkit-linear-gradient(right, #333, #000);
  background: -moz-linear-gradient(right, #333, #000);
  background: -o-linear-gradient(right, #333, #000);
  background: linear-gradient(to left, #333, #000);
}
.plan-video-artwork-ph.last {
  background: -webkit-gradient(
    linear,
    left top,
    right top,
    from(#333),
    to(#000)
  );
  background: -webkit-linear-gradient(left, #333, #000);
  background: -moz-linear-gradient(left, #333, #000);
  background: -o-linear-gradient(left, #333, #000);
  background: linear-gradient(to right, #333, #000);
}
.nf-modal-body a {
  text-decoration: underline;
}
.nf-modal-body a.plan-show-all {
  font-size: 1em;
}
.plan-disclaimer {
  font-size: 1em;
  color: #999;
  margin-top: 10px;
}
.plan-disclaimer a {
  font-size: 1em;
  color: #999;
}
.plan-disclaimer.white {
  color: #fff;
}
.plan-disclaimer.white a {
  color: #fff;
}
.plan-show-all {
  display: block;
  margin: 20px 0 40px;
}
.plan-title {
  margin: 20px 0;
}
.modal-btn {
  margin: 20px 0;
}
.eog-container {
  margin-top: 10px;
}
@media only screen and (min-width: 500px) {
  .eog-container {
    margin-top: 20px;
  }
}
.eog-container .akira-button {
  padding: 0.5em 2.5em;
}
.extended-diacritics-language .eog-container {
  line-height: 1.4;
}
@-webkit-keyframes animateProfileGate {
  from {
    opacity: 0;
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
  }
  to {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@-moz-keyframes animateProfileGate {
  from {
    opacity: 0;
    -moz-transform: scale(1.1);
    transform: scale(1.1);
  }
  to {
    opacity: 1;
    -moz-transform: scale(1);
    transform: scale(1);
  }
}
@-o-keyframes animateProfileGate {
  from {
    opacity: 0;
    -o-transform: scale(1.1);
    transform: scale(1.1);
  }
  to {
    opacity: 1;
    -o-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes animateProfileGate {
  from {
    opacity: 0;
    -webkit-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -o-transform: scale(1.1);
    transform: scale(1.1);
  }
  to {
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
  }
}
.profiles-gate-container {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  text-align: center;
  background: #141414;
  z-index: 0;
}
.profiles-gate-container .centered-div {
  z-index: 100;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.profiles-gate-container
  .centered-div.list-profiles-container:not(.js-transition-node) {
  -webkit-animation: animateProfileGate 450ms forwards;
  -moz-animation: animateProfileGate 450ms forwards;
  -o-animation: animateProfileGate 450ms forwards;
  animation: animateProfileGate 450ms forwards;
}
.profiles-gate-container .centered-div.loading-wrapper {
  opacity: 1;
}
@media screen and (max-width: 400px) {
  .profiles-gate-container {
    max-width: initial;
  }
}
.profiles-gate-container ul {
  padding: 0;
}
.profiles-gate-container .avatar-container {
  padding: 5px;
}
.profiles-gate-container .profile-icon {
  height: 10vw;
  width: 10vw;
  max-height: 200px;
  max-width: 200px;
  min-height: 84px;
  min-width: 84px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  position: relative;
  text-decoration: none;
  border: 0.3em solid rgba(0, 0, 0, 0.4);
  background-repeat: no-repeat;
  -moz-background-size: cover;
  background-size: cover;
  background-color: #333;
}
.profiles-gate-container .activeProfile {
  border-color: #e5e5e5;
}
.profiles-gate-container .profile-edit-mode {
  opacity: 0.5;
}
.profiles-gate-container .profile-name {
  line-height: 1.2em;
  min-height: 2.4em;
  color: grey;
  display: block;
  text-align: center;
  font-size: 1.3vw;
  margin: 0.8em 0;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  overflow: hidden;
}
@media screen and (min-width: 1666px) {
  .profiles-gate-container .profile-name {
    font-size: 24px;
  }
}
@media screen and (max-width: 800px) {
  .profiles-gate-container .profile-name {
    font-size: 12px;
  }
}
.profiles-gate-container li {
  display: inline-block;
  vertical-align: top;
  position: relative;
}
.profiles-gate-container li.profile {
  width: 10vw;
  max-width: 200px;
  min-width: 84px;
}
.profiles-gate-container li.profile:not(:last-child) {
  margin: 0 2vw 0 0;
}
.profiles-gate-container li a {
  text-decoration: none;
}
.profiles-gate-container li a.focused,
.profiles-gate-container li a:focus,
.profiles-gate-container li a:hover {
  cursor: pointer;
  outline: 0;
}
.profiles-gate-container li a.focused .profile-icon,
.profiles-gate-container li a:focus .profile-icon,
.profiles-gate-container li a:hover .profile-icon {
  border-color: #e5e5e5;
}
.profiles-gate-container li a.focused .profile-name,
.profiles-gate-container li a:focus .profile-name,
.profiles-gate-container li a:hover .profile-name {
  color: #e5e5e5;
}
.profiles-gate-container li a.focused .addProfileIcon,
.profiles-gate-container li a:focus .addProfileIcon,
.profiles-gate-container li a:hover .addProfileIcon {
  background-color: #e5e5e5;
}
.profiles-gate-container .addProfileIcon {
  font-size: 5vw;
  color: grey;
  text-align: center;
  text-decoration: none;
  height: 10vw;
  width: 10vw;
  max-height: 200px;
  max-width: 200px;
  min-height: 84px;
  min-width: 84px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
@media screen and (min-width: 1666px) {
  .profiles-gate-container .addProfileIcon {
    font-size: 100px;
  }
}
@media screen and (max-width: 865px) {
  .profiles-gate-container .addProfileIcon {
    font-size: 50px;
  }
}
.extended-diacritics-language .profiles-gate-container .profile-name {
  line-height: 1.5;
}
.profile-button {
  display: block;
  margin: 2em 0 1em 0;
  font-size: 1.3vw;
}
@media screen and (max-width: 800px) {
  .profile-button {
    font-size: 13px;
  }
}
.profile-button a,
.profile-button span {
  border: 1px solid grey;
  color: grey;
  text-transform: uppercase;
  padding: 0.5em 1.5em;
  letter-spacing: 2px;
  cursor: pointer;
  font-size: 0.9em;
}
.profile-button a:hover,
.profile-button span:hover {
  color: #fff;
  border: 1px solid #fff;
}
.profile-button.preferred-action a,
.profile-button.preferred-action span {
  background: #fff;
  color: #000;
  border: 1px solid #fff;
  font-weight: 700;
}
.profile-button.preferred-action.preferred-active a,
.profile-button.preferred-action.preferred-active span,
.profile-button.preferred-action:hover a,
.profile-button.preferred-action:hover span {
  background: #c00;
  border: 1px solid #c00;
  color: #fff;
}
.kids-profile-tooltip {
  position: absolute;
  right: -5.85em;
  bottom: 4em;
  width: 18em;
  font-size: 1vw;
  background: #fff;
  color: #000;
  padding: 0.8em;
  text-align: center;
  -webkit-transition: opacity 0.3s linear;
  -o-transition: opacity 0.3s linear;
  -moz-transition: opacity 0.3s linear;
  transition: opacity 0.3s linear;
  opacity: 1;
}
@media screen and (max-width: 800px) {
  .kids-profile-tooltip {
    right: -49px;
    bottom: 35px;
    width: 160px;
    font-size: 9px;
  }
}
.kids-profile-tooltip:after {
  top: 100%;
  left: 50%;
  border: solid transparent;
  content: "";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-top-color: #fff;
  border-width: 0.7em;
  margin-left: -0.7em;
}
.svg-icon-edit {
  width: 3rem;
  height: 3rem;
  fill: #fff;
}
.extended-diacritics-language .profile-button a,
.extended-diacritics-language .profile-button span {
  letter-spacing: initial;
}
.list-profiles {
  max-width: 80%;
}
.list-profiles .choose-profile,
.list-profiles .profile-gate-label {
  opacity: 1;
  -webkit-transition: opacity 0.4s ease-out;
  -o-transition: opacity 0.4s ease-out;
  -moz-transition: opacity 0.4s ease-out;
  transition: opacity 0.4s ease-out;
}
.list-profiles .choose-profile {
  margin: 2em 0;
}
.list-profiles .profile-gate-label {
  width: 100%;
  color: #fff;
  font-size: 3.5vw;
}
@media screen and (max-width: 800px) {
  .list-profiles .profile-gate-label {
    font-size: 30px;
  }
}
.list-profiles .avatar-wrapper {
  position: relative;
}
.list-profiles .svg-edit-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.list-profiles .svg-edit-overlay .svg-icon-edit {
  width: 3rem;
  height: 3rem;
  max-width: 70px;
  max-height: 70px;
}
.loading-profile-wrapper {
  opacity: 0;
}
.loading-profile-wrapper .akira-spinner {
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 28.8vw;
  margin-left: -14.4vw;
  margin-top: -14.4vw;
}
@media screen and (max-width: 865px) {
  .loading-profile-wrapper .akira-spinner {
    font-size: 249.6px;
    margin-left: -124.8px;
    margin-top: -124.8px;
  }
}
@media screen and (min-width: 1666px) {
  .loading-profile-wrapper .akira-spinner {
    font-size: 480px;
    margin-left: -240px;
    margin-top: -240px;
  }
}
.loading-profile-wrapper .errorLoading {
  -webkit-transition: opacity 0.2s linear;
  -o-transition: opacity 0.2s linear;
  -moz-transition: opacity 0.2s linear;
  transition: opacity 0.2s linear;
  opacity: 0;
}
.profile-load-error {
  opacity: 0;
  font-size: 1.4vw;
  color: grey;
  margin-top: 4vw;
  -webkit-transition: opacity 0.2s cubic-bezier(0.5, 0, 0.1, 1);
  -o-transition: opacity 0.2s cubic-bezier(0.5, 0, 0.1, 1);
  -moz-transition: opacity 0.2s cubic-bezier(0.5, 0, 0.1, 1);
  transition: opacity 0.2s cubic-bezier(0.5, 0, 0.1, 1);
}
.profile-load-error.show-error {
  opacity: 1;
}
@media screen and (max-width: 865px) {
  .profile-load-error {
    margin-top: 30px;
    font-size: 14px;
  }
}
@media screen and (min-width: 1666px) {
  .profile-load-error {
    margin-top: 50px;
  }
}
.profile-actions-container {
  text-align: left;
  position: relative;
}
.profile-actions-container h1,
.profile-actions-container h2 {
  font-weight: 400;
}
.profile-actions-container h1 {
  font-size: 4vw;
  margin: 0;
}
@media screen and (max-width: 800px) {
  .profile-actions-container h1 {
    font-size: 40px;
  }
}
.profile-actions-container h2 {
  font-size: 1.3vw;
  color: #666;
}
@media screen and (max-width: 800px) {
  .profile-actions-container h2 {
    font-size: 13px;
  }
}
.profile-actions-container .profile-button {
  display: inline-block;
  margin-right: 20px;
}
.profile-entry {
  border-top: 1px solid #333;
  border-bottom: 1px solid #333;
}
.profile-entry input[type="text"] {
  width: 18em;
  height: 2em;
  background: #666;
  border: 1px solid transparent;
  margin: 0 0.8em 0 0;
  padding: 0.2em 0.6em;
  color: #fff;
  font-size: 1.3vw;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  text-indent: 0.1vw;
}
@media screen and (max-width: 800px) {
  .profile-entry input[type="text"] {
    font-size: 13px;
  }
}
.profile-entry input[type="text"].name-error {
  border: 1px solid #b9090b;
}
.profile-entry input[type="text"]::-ms-clear {
  display: none;
}
.profile-entry input[type="text"]::-webkit-input-placeholder {
  color: #ccc;
}
.profile-entry input[type="text"]::-moz-placeholder {
  color: #ccc;
}
.profile-entry input[type="text"]:-ms-input-placeholder {
  color: #ccc;
}
.profile-entry input[type="text"]:focus {
  outline: 0;
}
.profile-entry label {
  display: inline;
}
.profile-entry input[type="checkbox"] {
  display: none;
}
.profile-entry input[type="checkbox"] + label {
  border: 1px solid #333;
  padding: 1em;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
  display: inline-block;
  position: relative;
  margin-right: 0.5em;
  font-size: 0.8vw;
}
@media screen and (max-width: 800px) {
  .profile-entry input[type="checkbox"] + label {
    font-size: 7px;
  }
}
.profile-entry input[type="checkbox"]:checked + label {
  border: 1px solid #333;
  color: #99a1a7;
}
.profile-entry input[type="checkbox"]:checked + label:after {
  content: "\2714";
  font-size: 2em;
  position: absolute;
  top: -0.1em;
  left: 0.08em;
  color: #fff;
}
.profile-entry.is-kids-profile input[type="checkbox"]:checked + label {
  border: none;
}
.profile-entry-error {
  color: #b9090b;
  font-size: 1vw;
  margin: 3px 0 0 0;
  width: 24rem;
}
@media screen and (max-width: 800px) {
  .profile-entry-error {
    font-size: 13px;
    margin-left: 15px;
  }
}
.profile-kids-warning {
  width: 24rem;
  margin-bottom: 0;
}
@media screen and (max-width: 800px) {
  .profile-kids-warning {
    font-size: 13px;
    margin-left: 15px;
  }
}
.profile-kids-warning.profile-kids-change-warning {
  color: #b9090b;
}
.profile-metadata {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  padding: 2em 0;
}
.profile-metadata .pulsate,
.profile-metadata img {
  height: 8vw;
  width: 8vw;
  max-height: 180px;
  max-width: 180px;
  min-height: 80px;
  min-width: 80px;
}
.profile-metadata img {
  -webkit-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
  -moz-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
  -o-transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
  transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.profile-metadata .profile-entry-inputs {
  vertical-align: middle;
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
@media screen and (max-width: 800px) {
  .profile-metadata .profile-entry-inputs {
    margin-left: 15px;
  }
}
.profile-metadata .main-profile-avatar {
  white-space: nowrap;
  margin-right: 1.5vw;
  width: 8vw;
  min-width: 80px;
  max-width: 180px;
}
.profile-metadata .main-profile-avatar:last-child {
  margin-right: 0;
}
.profile-metadata .main-profile-avatar .profile-name {
  margin-bottom: 0;
}
.profile-metadata .add-kids-marker {
  font-weight: 400;
  font-size: 1.3vw;
}
@media screen and (max-width: 800px) {
  .profile-metadata .add-kids-marker {
    font-size: 13px;
  }
}
.profile-edit-inputs {
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
@media screen and (max-width: 800px) {
  .profile-edit-inputs {
    margin-left: 15px;
  }
}
.profile-edit-inputs span {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.profile-entry-dropdowns {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.profile-entry-dropdowns .profileDropDown {
  margin-top: 1rem;
}
.profile-entry-dropdowns .profileDropDown .nfDropDown.theme-lakira {
  min-width: 18rem;
}
.profile-entry-dropdowns .profileDropDown .profileDropDown-label {
  font-size: 1.1vw;
  margin-bottom: 1px;
}
@media screen and (max-width: 1000px) {
  .profile-entry-dropdowns .profileDropDown .profileDropDown-label {
    font-size: 13px;
  }
}
.profile-entry-dropdowns .profileDropDown .sub-menu-item a:hover {
  text-decoration: underline;
}
@media screen and (max-width: 800px) {
  .profile-entry-dropdowns {
    margin-left: 15px;
  }
}
.profile-delete-warning {
  width: 25rem;
  text-align: center;
  font-size: 1.1vw;
}
@media screen and (max-width: 1000px) {
  .profile-delete-warning {
    font-size: 13px;
  }
}
.grey-scale {
  -webkit-filter: grayscale(1);
  filter: grayscale(1);
  -webkit-transition: 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  -o-transition: 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  -moz-transition: 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  transition: 0.5s cubic-bezier(0.5, 0, 0.1, 1);
}
.avatar-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  z-index: 2;
  border: 1px solid #666;
  background-color: #141414;
  width: 200px;
  -webkit-box-pack: start;
  -webkit-justify-content: flex-start;
  -moz-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
  position: absolute;
  top: 13.9rem;
  padding: 5px;
}
.avatar-container li {
  width: 25%;
  height: 100%;
}
.avatar-container ul {
  padding: 0.3vw;
}
.avatar-container img {
  margin: 6%;
  width: 80%;
  vertical-align: top;
  border: 2px solid #141414;
}
.avatar-container img:hover {
  border: 2px solid #e5e5e5;
  cursor: pointer;
}
.avatar-box {
  position: relative;
}
.avatar-box .avatar-edit-icon {
  cursor: pointer;
  position: absolute;
  bottom: 7%;
  left: 7%;
}
.avatar-box .avatar-edit-icon svg {
  width: 2rem;
  height: 2rem;
  max-width: 45px;
  max-height: 45px;
  background-color: rgba(0, 0, 0, 0.7);
  -webkit-filter: drop-shadow(1px 1px 2px #000);
  filter: drop-shadow(1px 1px 2px #000);
  -webkit-border-radius: 5rem;
  -moz-border-radius: 5rem;
  border-radius: 5rem;
}
.profile-delete-warning {
  width: 25vw;
  text-align: initial;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.profileSavingMask {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: 10;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  background-color: #141414;
  opacity: 0.75;
}
.profileSavingMask .akira-spinner {
  font-size: 2.5em;
}
.profile-add-parent {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.profile-add-parent .profile-entry-error {
  position: absolute;
  margin-top: 2.5em;
}
.ProfileWarning--container {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  z-index: 50000;
  background: rgba(0, 0, 0, 0.85);
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.ProfileWarning--message-container {
  padding: 1rem;
}
.ProfileWarning--title {
  font-size: 3.6rem;
  font-weight: 400;
  margin: 0;
  padding: 0;
}
.ProfileWarning--message {
  font-size: 1.8rem;
  margin: 2rem 0;
  padding: 0;
}
.ProfileWarning--action-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.ProfileWarning--action-button-refresh {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  color: #fff;
  background-color: #bf1315;
  border: 1px solid transparent;
  padding: 0.75rem 1rem;
  outline: 0;
  font-size: 1.8rem;
}
.ProfileWarning--action-button-refresh:focus,
.ProfileWarning--action-button-refresh:hover {
  border-color: #fff;
}
.bob-card {
  position: absolute;
  visibility: hidden;
  z-index: 2;
  background-color: #000;
}
.bob-card .svg-icon-chevron-down {
  width: 3vw;
  height: 1vw;
}
.bob-card .bob-outline {
  position: absolute;
  top: -1px;
  left: -1px;
  bottom: -1px;
  right: -1px;
  z-index: 1;
  border: solid 1px #141414;
}
.bob-card .bob-background {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 1;
}
.bob-card .bob-title-art {
  position: absolute;
  width: 100%;
  z-index: 3;
  pointer-events: none;
}
.bob-card .bob-static-image {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  -moz-background-size: cover;
  background-size: cover;
}
.bob-card .bob-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: -1px;
  left: -1px;
  cursor: pointer;
  z-index: 2;
  background-color: rgba(0, 0, 0, 0);
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(rgba(0, 0, 0, 0)),
    color-stop(33%, rgba(0, 0, 0, 0)),
    to(rgba(0, 0, 0, 0.85))
  );
  background-image: -webkit-linear-gradient(
    top,
    rgba(0, 0, 0, 0) 0,
    rgba(0, 0, 0, 0) 33%,
    rgba(0, 0, 0, 0.85) 100%
  );
  background-image: -moz-linear-gradient(
    top,
    rgba(0, 0, 0, 0) 0,
    rgba(0, 0, 0, 0) 33%,
    rgba(0, 0, 0, 0.85) 100%
  );
  background-image: -o-linear-gradient(
    top,
    rgba(0, 0, 0, 0) 0,
    rgba(0, 0, 0, 0) 33%,
    rgba(0, 0, 0, 0.85) 100%
  );
  background-image: linear-gradient(
    to bottom,
    rgba(0, 0, 0, 0) 0,
    rgba(0, 0, 0, 0) 33%,
    rgba(0, 0, 0, 0.85) 100%
  );
}
.bob-card .bob-overlay .bob-play-hitzone {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 1;
}
.bob-card .bob-overlay .bob-play-hitzone:focus a.playLink,
.bob-card .bob-overlay .bob-play-hitzone:hover a.playLink,
.bob-card .bob-overlay .bob-play-hitzone:hover ~ div a.playLink,
.bob-card .bob-overlay.no-grow .bob-play-hitzone a.playLink {
  opacity: 1;
  -webkit-transform: none;
  -moz-transform: none;
  -ms-transform: none;
  -o-transform: none;
  transform: none;
}
.bob-card .bob-overlay .bob-play-hitzone:focus a.playLink .playRing,
.bob-card .bob-overlay .bob-play-hitzone:hover a.playLink .playRing,
.bob-card .bob-overlay .bob-play-hitzone:hover ~ div a.playLink .playRing,
.bob-card .bob-overlay.no-grow .bob-play-hitzone a.playLink .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.bob-card .bob-overlay .bob-play-hitzone:focus a.playLink .icon-play,
.bob-card .bob-overlay .bob-play-hitzone:hover a.playLink .icon-play,
.bob-card .bob-overlay .bob-play-hitzone:hover ~ div a.playLink .icon-play,
.bob-card .bob-overlay.no-grow .bob-play-hitzone a.playLink .icon-play {
  color: #e50914;
}
.bob-card .bob-overlay .bob-jaw-hitzone-half {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 34%;
  z-index: 1;
}
.bob-card
  .bob-overlay
  .bob-jaw-hitzone-half:hover
  ~ .bob-info
  .bob-jawbone-bottom-chevron {
  color: #e50914;
  stroke: #e50914;
  stroke-width: 2px;
  stroke-linejoin: miter;
}
.bob-card .bob-overlay .bob-jaw-hitzone-only-info {
  z-index: 1;
}
.bob-card .bob-overlay .bob-jaw-hitzone-only-info .bob-info {
  z-index: 1;
  -webkit-transition: all 0.1s ease;
  -o-transition: all 0.1s ease;
  -moz-transition: all 0.1s ease;
  transition: all 0.1s ease;
}
.bob-card .bob-overlay .bob-jaw-hitzone-only-info .bob-info:hover {
  border-top: solid 1px rgba(255, 255, 255, 0.4);
  background: rgba(255, 255, 255, 0.2);
}
.bob-card
  .bob-overlay
  .bob-jaw-hitzone-only-info
  .bob-info:hover
  .bob-jawbone-right-chevron {
  color: #fff;
}
.bob-card .bob-overlay .bob-jaw-hitzone-only-info .bob-last-content {
  padding: 0.5vw 0 0 0;
  -webkit-align-self: center;
  -ms-flex-item-align: center;
  -ms-grid-row-align: center;
  align-self: center;
}
.bob-card .bob-overlay .bob-jaw-hitzone-only-button {
  display: inline-block;
  padding: 0 1vw 0.5vw 0;
  margin: 0 -1vw -0.5vw 0;
}
.bob-card .bob-overlay .bob-jaw-hitzone-only-button .bob-jawbone-right-chevron {
  padding: 0.8vw 0.75vw 0.65vw 0.75vw;
  margin-bottom: 0.1vw;
}
.bob-card
  .bob-overlay
  .bob-jaw-hitzone-only-button:hover
  .bob-jawbone-right-chevron {
  background: rgba(255, 255, 255, 0.2);
  color: #fff;
}
.bob-card .bob-overlay .bob-jawbone-bottom-chevron {
  padding: 0.5vw 0 0 0;
}
.bob-card .bob-overlay .bob-jawbone-right-chevron {
  text-align: center;
  color: rgba(255, 255, 255, 0.4);
}
.bob-card .bob-overlay .bob-play {
  top: 30%;
  left: 50%;
}
.bob-card .bob-overlay .bob-play.bob-play-lowerTop,
.bob-card .bob-overlay .bob-play.bob-play-middle,
.bob-card .bob-overlay .bob-play.bob-play-top {
  font-size: 5vw;
  height: 5.5vw;
  width: 5.5vw;
  margin-left: -2.625vw;
  margin-top: -2.625vw;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #fff;
  opacity: 0.2;
  position: absolute;
  z-index: 100;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: 0;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
}
.bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus,
.bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover,
.bob-card .bob-overlay .bob-play.bob-play-middle:focus,
.bob-card .bob-overlay .bob-play.bob-play-middle:hover,
.bob-card .bob-overlay .bob-play.bob-play-top:focus,
.bob-card .bob-overlay .bob-play.bob-play-top:hover {
  text-decoration: none;
  opacity: 1;
  -webkit-transform: scale(1.08, 1.08);
  -moz-transform: scale(1.08, 1.08);
  -ms-transform: scale(1.08, 1.08);
  -o-transform: scale(1.08, 1.08);
  transform: scale(1.08, 1.08);
}
.bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus .playRing,
.bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover .playRing,
.bob-card .bob-overlay .bob-play.bob-play-middle:focus .playRing,
.bob-card .bob-overlay .bob-play.bob-play-middle:hover .playRing,
.bob-card .bob-overlay .bob-play.bob-play-top:focus .playRing,
.bob-card .bob-overlay .bob-play.bob-play-top:hover .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus .play,
.bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover .play,
.bob-card .bob-overlay .bob-play.bob-play-middle:focus .play,
.bob-card .bob-overlay .bob-play.bob-play-middle:hover .play,
.bob-card .bob-overlay .bob-play.bob-play-top:focus .play,
.bob-card .bob-overlay .bob-play.bob-play-top:hover .play {
  color: #e50914;
}
.bob-card .bob-overlay .bob-play.bob-play-lowerTop .annotation,
.bob-card .bob-overlay .bob-play.bob-play-middle .annotation,
.bob-card .bob-overlay .bob-play.bob-play-top .annotation {
  text-align: center;
  position: absolute;
  width: 200%;
  font-size: 18%;
  left: -50%;
  white-space: nowrap;
  bottom: -1.4vw;
  font-weight: 700;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
}
.bob-card .bob-overlay .bob-play.bob-play-lowerTop .playRing,
.bob-card .bob-overlay .bob-play.bob-play-middle .playRing,
.bob-card .bob-overlay .bob-play.bob-play-top .playRing {
  height: 5vw;
  width: 5vw;
  border: 0.25vw solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
}
.bob-card .bob-overlay .bob-play.bob-play-lowerTop .playRing:after,
.bob-card .bob-overlay .bob-play.bob-play-middle .playRing:after,
.bob-card .bob-overlay .bob-play.bob-play-top .playRing:after {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  content: "";
  position: absolute;
  z-index: -1;
  left: 0;
  height: 100%;
  width: 100%;
}
.bob-card .bob-overlay .bob-play.bob-play-lowerTop .play,
.bob-card .bob-overlay .bob-play.bob-play-middle .play,
.bob-card .bob-overlay .bob-play.bob-play-top .play {
  line-height: 5vw;
  width: 100%;
  color: #fff;
  font-size: 46%;
  left: 6%; /*!rtl:ignore*/
  text-align: center;
  position: absolute;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop,
  .bob-card .bob-overlay .bob-play.bob-play-middle,
  .bob-card .bob-overlay .bob-play.bob-play-top {
    font-size: 6vw;
    height: 6.6vw;
    width: 6.6vw;
    margin-left: -3.15vw;
    margin-top: -3.15vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0.2;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus,
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover,
  .bob-card .bob-overlay .bob-play.bob-play-middle:focus,
  .bob-card .bob-overlay .bob-play.bob-play-middle:hover,
  .bob-card .bob-overlay .bob-play.bob-play-top:focus,
  .bob-card .bob-overlay .bob-play.bob-play-top:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-middle:focus .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-middle:hover .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-top:focus .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-top:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus .play,
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover .play,
  .bob-card .bob-overlay .bob-play.bob-play-middle:focus .play,
  .bob-card .bob-overlay .bob-play.bob-play-middle:hover .play,
  .bob-card .bob-overlay .bob-play.bob-play-top:focus .play,
  .bob-card .bob-overlay .bob-play.bob-play-top:hover .play {
    color: #e50914;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .annotation,
  .bob-card .bob-overlay .bob-play.bob-play-middle .annotation,
  .bob-card .bob-overlay .bob-play.bob-play-top .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.68vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-middle .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-top .playRing {
    height: 6vw;
    width: 6vw;
    border: 0.3vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .playRing:after,
  .bob-card .bob-overlay .bob-play.bob-play-middle .playRing:after,
  .bob-card .bob-overlay .bob-play.bob-play-top .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .play,
  .bob-card .bob-overlay .bob-play.bob-play-middle .play,
  .bob-card .bob-overlay .bob-play.bob-play-top .play {
    line-height: 6vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop,
  .bob-card .bob-overlay .bob-play.bob-play-middle,
  .bob-card .bob-overlay .bob-play.bob-play-top {
    font-size: 5vw;
    height: 5.5vw;
    width: 5.5vw;
    margin-left: -2.625vw;
    margin-top: -2.625vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0.2;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus,
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover,
  .bob-card .bob-overlay .bob-play.bob-play-middle:focus,
  .bob-card .bob-overlay .bob-play.bob-play-middle:hover,
  .bob-card .bob-overlay .bob-play.bob-play-top:focus,
  .bob-card .bob-overlay .bob-play.bob-play-top:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-middle:focus .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-middle:hover .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-top:focus .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-top:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus .play,
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover .play,
  .bob-card .bob-overlay .bob-play.bob-play-middle:focus .play,
  .bob-card .bob-overlay .bob-play.bob-play-middle:hover .play,
  .bob-card .bob-overlay .bob-play.bob-play-top:focus .play,
  .bob-card .bob-overlay .bob-play.bob-play-top:hover .play {
    color: #e50914;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .annotation,
  .bob-card .bob-overlay .bob-play.bob-play-middle .annotation,
  .bob-card .bob-overlay .bob-play.bob-play-top .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.4vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-middle .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-top .playRing {
    height: 5vw;
    width: 5vw;
    border: 0.25vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .playRing:after,
  .bob-card .bob-overlay .bob-play.bob-play-middle .playRing:after,
  .bob-card .bob-overlay .bob-play.bob-play-top .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .play,
  .bob-card .bob-overlay .bob-play.bob-play-middle .play,
  .bob-card .bob-overlay .bob-play.bob-play-top .play {
    line-height: 5vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
@media screen and (min-width: 1400px) {
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop,
  .bob-card .bob-overlay .bob-play.bob-play-middle,
  .bob-card .bob-overlay .bob-play.bob-play-top {
    font-size: 4.5vw;
    height: 4.95vw;
    width: 4.95vw;
    margin-left: -2.3625vw;
    margin-top: -2.3625vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0.2;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus,
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover,
  .bob-card .bob-overlay .bob-play.bob-play-middle:focus,
  .bob-card .bob-overlay .bob-play.bob-play-middle:hover,
  .bob-card .bob-overlay .bob-play.bob-play-top:focus,
  .bob-card .bob-overlay .bob-play.bob-play-top:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-middle:focus .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-middle:hover .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-top:focus .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-top:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:focus .play,
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop:hover .play,
  .bob-card .bob-overlay .bob-play.bob-play-middle:focus .play,
  .bob-card .bob-overlay .bob-play.bob-play-middle:hover .play,
  .bob-card .bob-overlay .bob-play.bob-play-top:focus .play,
  .bob-card .bob-overlay .bob-play.bob-play-top:hover .play {
    color: #e50914;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .annotation,
  .bob-card .bob-overlay .bob-play.bob-play-middle .annotation,
  .bob-card .bob-overlay .bob-play.bob-play-top .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.26vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-middle .playRing,
  .bob-card .bob-overlay .bob-play.bob-play-top .playRing {
    height: 4.5vw;
    width: 4.5vw;
    border: 0.225vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .playRing:after,
  .bob-card .bob-overlay .bob-play.bob-play-middle .playRing:after,
  .bob-card .bob-overlay .bob-play.bob-play-top .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .bob-card .bob-overlay .bob-play.bob-play-lowerTop .play,
  .bob-card .bob-overlay .bob-play.bob-play-middle .play,
  .bob-card .bob-overlay .bob-play.bob-play-top .play {
    line-height: 4.5vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
.bob-card .bob-overlay .bob-play.bob-play-lowerTop {
  top: 35%;
}
.bob-card .bob-overlay .bob-title {
  line-height: 1.4;
  font-weight: 700;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
  font-size: 1vw;
}
@media screen and (max-width: 499px) {
  .bob-card .bob-overlay .bob-title {
    font-size: 2.5vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .bob-card .bob-overlay .bob-title {
    font-size: 2vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .bob-card .bob-overlay .bob-title {
    font-size: 1.6vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bob-card .bob-overlay .bob-title {
    font-size: 1.4vw;
  }
}
@media screen and (min-width: 1400px) {
  .bob-card .bob-overlay .bob-title {
    font-size: 1.2vw;
  }
}
.bob-card .bob-overlay .bob-info {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  cursor: pointer;
  color: #fff;
  padding: 0.5vw 1vw 0.8vw 1vw;
}
.bob-card .bob-overlay .bob-info .bob-info-main {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  z-index: 1;
  pointer-events: none;
}
.bob-card .bob-overlay .bob-info .bob-info-main .bob-first-content {
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 12%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 12%;
  flex: 0 0 12%;
  text-align: left;
  z-index: 1;
  position: relative;
  -webkit-align-self: center;
  -ms-flex-item-align: center;
  -ms-grid-row-align: center;
  align-self: center;
}
.bob-card .bob-overlay .bob-info .bob-info-main .bob-first-content a {
  pointer-events: auto;
}
.bob-card .bob-overlay .bob-info .bob-info-main .bob-text {
  text-align: left;
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 85%;
  -moz-box-flex: 1;
  -ms-flex: 1 1 85%;
  flex: 1 1 85%;
  max-width: 87%;
  padding: 0 5px 0 0;
  z-index: 1;
}
.bob-card .bob-overlay .bob-info .bob-info-main .bob-text .starbar {
  pointer-events: auto;
}
.bob-card .bob-overlay .bob-info .bob-info-main .bob-last-content {
  position: relative;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  text-align: right;
  z-index: 1;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.bob-card
  .bob-overlay
  .bob-info
  .bob-info-main
  .bob-last-content
  .thumb-container,
.bob-card .bob-overlay .bob-info .bob-info-main .bob-last-content a {
  pointer-events: auto;
}
.bob-card .bob-overlay .bob-info .bob-info-bottom {
  text-align: center;
}
.bob-card .bob-overlay .bob-info .watched-label {
  font-size: 1.8vw;
  margin-bottom: 2px;
}
.bob-card .bob-overlay .bob-info .watched-title {
  font-size: 0.9vw;
  margin-top: -1px;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}
@media screen and (max-width: 499px) {
  .bob-card .bob-overlay .bob-info .watched-title {
    font-size: 2.25vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .bob-card .bob-overlay .bob-info .watched-title {
    font-size: 1.8vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .bob-card .bob-overlay .bob-info .watched-title {
    font-size: 1.44vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bob-card .bob-overlay .bob-info .watched-title {
    font-size: 1.26vw;
  }
}
@media screen and (min-width: 1400px) {
  .bob-card .bob-overlay .bob-info .watched-title {
    font-size: 1.08vw;
  }
}
.bob-card .bob-overlay .bob-info .meta,
.bob-card .bob-overlay .bob-info .synopsis {
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
}
.bob-card .bob-overlay .bob-info .bob-title + .synopsis {
  margin-top: 0.2vw;
}
.bob-card .bob-overlay .bob-info .tagline {
  font-size: 1.1vw;
  font-weight: 700;
  margin-bottom: 0.5vw;
}
.bob-card .bob-overlay .bob-info .synopsis {
  position: relative;
  line-height: 1.1;
  font-size: 0.8vw;
}
@media screen and (max-width: 499px) {
  .bob-card .bob-overlay .bob-info .synopsis {
    font-size: 2vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .bob-card .bob-overlay .bob-info .synopsis {
    font-size: 1.6vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .bob-card .bob-overlay .bob-info .synopsis {
    font-size: 1.28vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bob-card .bob-overlay .bob-info .synopsis {
    font-size: 1.12vw;
  }
}
@media screen and (min-width: 1400px) {
  .bob-card .bob-overlay .bob-info .synopsis {
    font-size: 0.96vw;
  }
}
.bob-card .bob-overlay .bob-info .meta {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  color: #fff;
  margin: 0.3vw 0 0 0;
  height: auto;
  font-size: 0.8vw;
  min-height: 0.8vw;
  line-height: 0.8vw;
}
.bob-card .bob-overlay .bob-info .meta .duration,
.bob-card .bob-overlay .bob-info .meta .maturity-rating,
.bob-card .bob-overlay .bob-info .meta .year {
  display: inline-block;
  margin-right: 0.333vw;
}
.bob-card .bob-overlay .bob-info .meta .duration,
.bob-card .bob-overlay .bob-info .meta .maturity-rating,
.bob-card .bob-overlay .bob-info .meta .rating-wrapper,
.bob-card .bob-overlay .bob-info .meta .year {
  margin-bottom: 0.3vw;
}
.bob-card .bob-overlay .bob-info .meta .rating-inner {
  line-height: 0.8vw;
  height: 0.8vw;
}
@media screen and (max-width: 499px) {
  .bob-card .bob-overlay .bob-info .meta {
    font-size: 2vw;
    min-height: 2vw;
    line-height: 2vw;
  }
  .bob-card .bob-overlay .bob-info .meta .rating-inner {
    line-height: 2vw;
    height: 2vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .bob-card .bob-overlay .bob-info .meta {
    font-size: 1.6vw;
    min-height: 1.6vw;
    line-height: 1.6vw;
  }
  .bob-card .bob-overlay .bob-info .meta .rating-inner {
    line-height: 1.6vw;
    height: 1.6vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .bob-card .bob-overlay .bob-info .meta {
    font-size: 1.28vw;
    min-height: 1.28vw;
    line-height: 1.28vw;
  }
  .bob-card .bob-overlay .bob-info .meta .rating-inner {
    line-height: 1.28vw;
    height: 1.28vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bob-card .bob-overlay .bob-info .meta {
    font-size: 1.08vw;
    min-height: 1.08vw;
    line-height: 1.08vw;
  }
  .bob-card .bob-overlay .bob-info .meta .rating-inner {
    line-height: 1.08vw;
    height: 1.08vw;
  }
}
@media screen and (min-width: 1400px) {
  .bob-card .bob-overlay .bob-info .meta {
    font-size: 0.96vw;
    min-height: 0.96vw;
    line-height: 0.96vw;
  }
  .bob-card .bob-overlay .bob-info .meta .rating-inner {
    line-height: 0.96vw;
    height: 0.96vw;
  }
}
.bob-card .bob-overlay .bob-info .meta .starbar {
  position: relative;
  font-size: 0.6em;
  margin-right: 1em;
}
.bob-card .bob-overlay .bob-info .meta .starbar .star {
  padding-left: 0.3em;
}
.bob-card .bob-overlay .bob-info .meta .starbar .star:first-child {
  padding-left: 0;
}
.bob-card .bob-overlay .bob-info .meta .starbar .star.sb-placeholder {
  color: rgba(255, 255, 255, 0.85);
}
.bob-card .bob-overlay .bob-info .meta .starbar .transitionWrap {
  padding-left: 0.3em;
}
.bob-card .bob-overlay .bob-info .meta .starbar .transitionWrap .star {
  padding-left: 0;
}
.bob-card .bob-overlay .bob-info .meta .duration,
.bob-card .bob-overlay .bob-info .meta .year {
  font-weight: 700;
}
.bob-card .bob-overlay .bob-info .meta .maturity-rating .maturity-number {
  border: solid 1px rgba(255, 255, 255, 0.4);
}
.bob-card .bob-overlay .bob-info .progress {
  padding: 3px 0 0 0;
  font-size: 0.8vw;
}
@media screen and (max-width: 499px) {
  .bob-card .bob-overlay .bob-info .progress {
    font-size: 1.6vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .bob-card .bob-overlay .bob-info .progress {
    font-size: 1.44vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .bob-card .bob-overlay .bob-info .progress {
    font-size: 1.28vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .bob-card .bob-overlay .bob-info .progress {
    font-size: 1vw;
  }
}
@media screen and (min-width: 1400px) {
  .bob-card .bob-overlay .bob-info .progress {
    font-size: 0.96vw;
  }
}
.bob-card.bob-card-tall-panel .bob-background {
  padding-top: 200%;
}
.bob-card.bob-card-tall-panel .bob-overlay {
  padding-top: 200%;
}
.bob-card.bob-card-tall-panel
  .bob-overlay
  .bob-info
  .bob-info-main
  .bob-last-content {
  position: absolute;
  right: 0.25vw;
  bottom: 0.25vw;
}
.bob-card.bob-card-tall-panel .bob-overlay .bob-info .bob-info-main .bob-text {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  max-width: 100%;
  padding: 0;
}
.bob-card.bob-card-tall-panel .bob-overlay .bob-jawbone-bottom-chevron {
  padding-top: 1.4vw;
}
.bob-card.bob-card-tall-panel .bob-overlay .bob-play.bob-play-lowerTop {
  top: 50%;
}
.bob-card.bob-card-tall-panel .bob-overlay .mylist-container {
  font-size: 1vw;
  border-left: 0;
  padding: 0.5vw;
}
.bob-card.bob-card-tall-panel
  .bob-overlay
  .mylist-container
  .mylist-button
  .nf-icon-button-icon,
.bob-card.bob-card-tall-panel
  .bob-overlay
  .mylist-container
  .mylist-button.hovered
  .nf-icon-button-icon {
  background-color: transparent;
}
.bob-card.bob-card-tall-panel
  .bob-overlay
  .mylist-container
  .icon-button-mylist-add,
.bob-card.bob-card-tall-panel
  .bob-overlay
  .mylist-container
  .icon-button-mylist-add-reverse {
  font-size: 1.2vw;
}
.bob-card.bob-card-tall-panel
  .bob-overlay
  .mylist-container
  .icon-button-play:before {
  content: "\e646";
}
.bob-card.bob-card-tall-panel
  .bob-overlay
  .mylist-container
  .icon-button-mylist-add:before {
  content: "\f018";
}
.bob-card.bob-card-tall-panel
  .bob-overlay
  .mylist-container
  .icon-button-mylist-add-reverse:before {
  content: "\f018";
}
.bob-card.bob-card-tall-panel
  .bob-overlay
  .mylist-container
  .icon-button-mylist-added:before {
  content: "\e804";
}
.bob-card.bob-card-tall-panel
  .bob-overlay
  .mylist-container
  .icon-button-mylist-added-reverse:before {
  content: "\e804";
}
.bob-card.bob-card-tall-panel
  .bob-overlay
  .mylist-container
  .nf-icon-button-icon {
  width: 2vw;
  height: 2vw;
  line-height: 2vw;
  text-align: center;
}
.bob-card.has-right-jaw-button .bob-overlay .bob-info .bob-info-main .bob-text {
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 80%;
  -moz-box-flex: 1;
  -ms-flex: 1 1 80%;
  flex: 1 1 80%;
  max-width: 82%;
}
.bob-card.has-right-jaw-button
  .bob-overlay
  .bob-info
  .bob-info-main
  .bob-last-content {
  -webkit-box-flex: 0;
  -webkit-flex: 0 1 20%;
  -moz-box-flex: 0;
  -ms-flex: 0 1 20%;
  flex: 0 1 20%;
}
.stamp {
  position: absolute;
  left: 0;
  bottom: 0;
  padding: 20px;
}
.global-supplemental-audio-toggle .nf-svg-button svg {
  width: 1.1em;
  height: 1.1em;
}
@-webkit-keyframes hoverPulse {
  0% {
    -webkit-filter: brightness(1.08);
    filter: brightness(1.08);
  }
  30% {
    -webkit-filter: brightness(1.08);
    filter: brightness(1.08);
  }
  100% {
    -webkit-filter: brightness(1);
    filter: brightness(1);
  }
}
@-moz-keyframes hoverPulse {
  0% {
    -webkit-filter: brightness(1.08);
    filter: brightness(1.08);
  }
  30% {
    -webkit-filter: brightness(1.08);
    filter: brightness(1.08);
  }
  100% {
    -webkit-filter: brightness(1);
    filter: brightness(1);
  }
}
@-o-keyframes hoverPulse {
  0% {
    -webkit-filter: brightness(1.08);
    filter: brightness(1.08);
  }
  30% {
    -webkit-filter: brightness(1.08);
    filter: brightness(1.08);
  }
  100% {
    -webkit-filter: brightness(1);
    filter: brightness(1);
  }
}
@keyframes hoverPulse {
  0% {
    -webkit-filter: brightness(1.08);
    filter: brightness(1.08);
  }
  30% {
    -webkit-filter: brightness(1.08);
    filter: brightness(1.08);
  }
  100% {
    -webkit-filter: brightness(1);
    filter: brightness(1);
  }
}
.rowContainer:not(.bobOpen) .smallTitleCard:hover .video-artwork {
  -webkit-animation: hoverPulse 1s;
  -moz-animation: hoverPulse 1s;
  -o-animation: hoverPulse 1s;
  animation: hoverPulse 1s;
}
.rowContainer:not(.bobOpen)
  .smallTitleCard:hover.has-white-hover-state
  .video-artwork {
  opacity: 0.85;
  -webkit-animation: none;
  -moz-animation: none;
  -o-animation: none;
  animation: none;
}
.title-card {
  position: relative;
  margin: 0 2px;
  z-index: 1;
  cursor: pointer;
  outline: 0;
}
.title-card:not(.loadingTitle) {
  display: block;
}
.title-card:hover.has-white-hover-state {
  background-color: #fff;
}
.title-card.is-focused {
  visibility: visible;
  opacity: 1;
  z-index: 2;
}
.title-card.is-dimmed {
  opacity: 0.6;
}
.title-card.is-disliked .bob-background,
.title-card.is-disliked .bob-title-art,
.title-card.is-disliked .video-artwork {
  -webkit-filter: grayscale(100%);
  filter: grayscale(100%);
}
.title-card.is-disliked .bob-title-art,
.title-card.is-disliked .video-artwork {
  opacity: 0.3;
  -webkit-transition: all 350ms cubic-bezier(0.86, 0, 0.07, 1);
  -o-transition: all 350ms cubic-bezier(0.86, 0, 0.07, 1);
  -moz-transition: all 350ms cubic-bezier(0.86, 0, 0.07, 1);
  transition: all 350ms cubic-bezier(0.86, 0, 0.07, 1);
}
.title-card.is-disliked .video-preload-title {
  display: none;
}
.title-card:hover .title-card-play {
  display: block;
}
.title-card .title-card-play {
  display: none;
  top: 50%;
  left: 50%;
  font-size: 4.3vw;
  height: 4.73vw;
  width: 4.73vw;
  margin-left: -2.2575vw;
  margin-top: -2.2575vw;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  color: #fff;
  opacity: 0.7;
  position: absolute;
  z-index: 100;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: 0;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
}
.title-card .title-card-play:focus,
.title-card .title-card-play:hover {
  text-decoration: none;
  opacity: 1;
  -webkit-transform: scale(1.08, 1.08);
  -moz-transform: scale(1.08, 1.08);
  -ms-transform: scale(1.08, 1.08);
  -o-transform: scale(1.08, 1.08);
  transform: scale(1.08, 1.08);
}
.title-card .title-card-play:focus .playRing,
.title-card .title-card-play:hover .playRing {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
}
.title-card .title-card-play:focus .play,
.title-card .title-card-play:hover .play {
  color: #e50914;
}
.title-card .title-card-play .annotation {
  text-align: center;
  position: absolute;
  width: 200%;
  font-size: 18%;
  left: -50%;
  white-space: nowrap;
  bottom: -1.204vw;
  font-weight: 700;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
}
.title-card .title-card-play .playRing {
  height: 4.3vw;
  width: 4.3vw;
  border: 0.215vw solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
}
.title-card .title-card-play .playRing:after {
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  content: "";
  position: absolute;
  z-index: -1;
  left: 0;
  height: 100%;
  width: 100%;
}
.title-card .title-card-play .play {
  line-height: 4.3vw;
  width: 100%;
  color: #fff;
  font-size: 46%;
  left: 6%; /*!rtl:ignore*/
  text-align: center;
  position: absolute;
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .title-card .title-card-play {
    font-size: 6vw;
    height: 6.6vw;
    width: 6.6vw;
    margin-left: -3.15vw;
    margin-top: -3.15vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0.7;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .title-card .title-card-play:focus,
  .title-card .title-card-play:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .title-card .title-card-play:focus .playRing,
  .title-card .title-card-play:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .title-card .title-card-play:focus .play,
  .title-card .title-card-play:hover .play {
    color: #e50914;
  }
  .title-card .title-card-play .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.68vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .title-card .title-card-play .playRing {
    height: 6vw;
    width: 6vw;
    border: 0.3vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .title-card .title-card-play .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .title-card .title-card-play .play {
    line-height: 6vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .title-card .title-card-play {
    font-size: 4.7vw;
    height: 5.17vw;
    width: 5.17vw;
    margin-left: -2.4675vw;
    margin-top: -2.4675vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0.7;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .title-card .title-card-play:focus,
  .title-card .title-card-play:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .title-card .title-card-play:focus .playRing,
  .title-card .title-card-play:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .title-card .title-card-play:focus .play,
  .title-card .title-card-play:hover .play {
    color: #e50914;
  }
  .title-card .title-card-play .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.316vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .title-card .title-card-play .playRing {
    height: 4.7vw;
    width: 4.7vw;
    border: 0.235vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .title-card .title-card-play .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .title-card .title-card-play .play {
    line-height: 4.7vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
@media screen and (min-width: 1400px) {
  .title-card .title-card-play {
    font-size: 3.8vw;
    height: 4.18vw;
    width: 4.18vw;
    margin-left: -1.995vw;
    margin-top: -1.995vw;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    color: #fff;
    opacity: 0.7;
    position: absolute;
    z-index: 100;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: 0;
    -webkit-transition: all 150ms ease;
    -o-transition: all 150ms ease;
    -moz-transition: all 150ms ease;
    transition: all 150ms ease;
  }
  .title-card .title-card-play:focus,
  .title-card .title-card-play:hover {
    text-decoration: none;
    opacity: 1;
    -webkit-transform: scale(1.08, 1.08);
    -moz-transform: scale(1.08, 1.08);
    -ms-transform: scale(1.08, 1.08);
    -o-transform: scale(1.08, 1.08);
    transform: scale(1.08, 1.08);
  }
  .title-card .title-card-play:focus .playRing,
  .title-card .title-card-play:hover .playRing {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.5);
  }
  .title-card .title-card-play:focus .play,
  .title-card .title-card-play:hover .play {
    color: #e50914;
  }
  .title-card .title-card-play .annotation {
    text-align: center;
    position: absolute;
    width: 200%;
    font-size: 18%;
    left: -50%;
    white-space: nowrap;
    bottom: -1.064vw;
    font-weight: 700;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.7);
  }
  .title-card .title-card-play .playRing {
    height: 3.8vw;
    width: 3.8vw;
    border: 0.19vw solid #fff;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    position: absolute;
  }
  .title-card .title-card-play .playRing:after {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    content: "";
    position: absolute;
    z-index: -1;
    left: 0;
    height: 100%;
    width: 100%;
  }
  .title-card .title-card-play .play {
    line-height: 3.8vw;
    width: 100%;
    color: #fff;
    font-size: 46%;
    left: 6%; /*!rtl:ignore*/
    text-align: center;
    position: absolute;
  }
}
.title-card .title-card-jawbone-focus {
  opacity: 0;
}
.title-card .title-card-focus-ring {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border: solid 4px #fff;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: -4px;
  -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
}
.title-card .title-card-focus-ring::before {
  content: "";
  width: 0;
  height: 0;
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -13px;
  border-style: solid;
  border-width: 7px 13px 0 13px;
  border-color: rgba(0, 0, 0, 0.15) transparent transparent transparent;
  margin-top: 5px;
}
.title-card .title-card-focus-ring::after {
  content: "";
  width: 0;
  height: 0;
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -13px;
  border-style: solid;
  border-width: 7px 13px 0 13px;
  margin-top: 4px;
  border-color: #fff transparent transparent transparent;
}
.title-card .motion-boxart {
  height: 100%;
  width: auto;
  position: absolute;
  top: 0;
  pointer-events: none;
  -webkit-transition: opacity 250ms;
  -o-transition: opacity 250ms;
  -moz-transition: opacity 250ms;
  transition: opacity 250ms;
  opacity: 0;
}
.title-card .motion-boxart.active {
  opacity: 1;
}
.title-card:not(.is-bob-open) a:focus .video-artwork {
  -webkit-transform: scale(1.02);
  -moz-transform: scale(1.02);
  -ms-transform: scale(1.02);
  -o-transform: scale(1.02);
  transform: scale(1.02);
}
.title-card .slider-refocus {
  outline: 0;
}
.title-card .video-preload-title {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: #222;
  z-index: -1;
}
.title-card .video-preload-title .video-preload-title-label {
  color: #e5e5e5;
  position: absolute;
  bottom: 0;
  right: 0;
  left: 0;
  padding: 1em;
  white-space: nowrap;
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
}
.title-card-container > .progress {
  padding: 3% 20% 0;
  position: absolute;
  left: 0;
  right: 0;
  -webkit-transition: opacity 350ms;
  -o-transition: opacity 350ms;
  -moz-transition: opacity 350ms;
  transition: opacity 350ms;
}
.title-card-container > .progress .progress-bar,
.title-card-container > .progress .progress-completed {
  height: 3px;
}
.title-card-synopsis {
  width: 80%;
  color: #e0e0e0;
  margin-top: 5px;
  font-size: 0.8vw;
}
@media screen and (max-width: 499px) {
  .title-card-synopsis {
    font-size: 2vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .title-card-synopsis {
    font-size: 1.6vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .title-card-synopsis {
    font-size: 1.28vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .title-card-synopsis {
    font-size: 1.12vw;
  }
}
@media screen and (min-width: 1400px) {
  .title-card-synopsis {
    font-size: 0.96vw;
  }
}
.jawBoneOpen .title-card-synopsis {
  display: none;
}
.title-card-duration {
  position: absolute;
  left: 5px;
  bottom: 5px;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  border-radius: 2px;
  background-color: #fff;
  color: #000;
  padding: 1px 3px;
  font-size: 0.72vw;
}
@media screen and (max-width: 499px) {
  .title-card-duration {
    font-size: 1.8vw;
  }
}
@media screen and (min-width: 500px) and (max-width: 799px) {
  .title-card-duration {
    font-size: 1.44vw;
  }
}
@media screen and (min-width: 800px) and (max-width: 1099px) {
  .title-card-duration {
    font-size: 1.152vw;
  }
}
@media screen and (min-width: 1100px) and (max-width: 1399px) {
  .title-card-duration {
    font-size: 1.008vw;
  }
}
@media screen and (min-width: 1400px) {
  .title-card-duration {
    font-size: 0.864vw;
  }
}
.lolomoRow.jawBoneOpen .title-card-container > .progress {
  opacity: 0;
}
.title-card-tall-panel .video-artwork {
  opacity: 0;
}
.title-card-tall-panel .video-artwork-tall {
  position: absolute;
  opacity: 1;
  top: 0;
  left: 0;
  width: 100%;
  padding: 200% 0 0;
  -moz-background-size: cover;
  background-size: cover;
  background-position: center center;
  -webkit-transition: padding 0.4s;
  -o-transition: padding 0.4s;
  -moz-transition: padding 0.4s;
  transition: padding 0.4s;
}
.title-card-tall-panel .tall-panel-bob-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  padding: 200% 0 0;
}
.title-card-tall-panel .video-preload-title {
  padding-top: 200%;
  -webkit-transition: padding 0.4s;
  -o-transition: padding 0.4s;
  -moz-transition: padding 0.4s;
  transition: padding 0.4s;
}
.title-card-tall-panel .fallback-text-container {
  background-image: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(rgba(0, 0, 0, 0)),
    to(#000)
  );
  background-image: -webkit-linear-gradient(rgba(0, 0, 0, 0), #000);
  background-image: -moz-linear-gradient(rgba(0, 0, 0, 0), #000);
  background-image: -o-linear-gradient(rgba(0, 0, 0, 0), #000);
  background-image: linear-gradient(rgba(0, 0, 0, 0), #000);
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  height: 40%;
}
.title-card-tall-panel .fallback-text,
.title-card-tall-panel .video-preload-title .video-preload-title-label {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  position: absolute;
  bottom: 0;
  left: 8%;
  right: 8%;
  margin: 0;
  padding: 0 0 16%;
  font-size: 1.5em;
  font-weight: 700;
  text-align: center;
  white-space: normal;
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
}
.title-card-tall-panel.is-disliked .lazy-background-image {
  opacity: 0;
}
.jawBoneOpen .title-card-tall-panel .video-preload-title {
  padding: 28.125% 0;
  opacity: 0;
}
.jawBoneOpen .title-card-tall-panel .video-artwork {
  opacity: 1;
  -webkit-transition: opacity 0.4s 0.3s;
  -o-transition: opacity 0.4s 0.3s;
  -moz-transition: opacity 0.4s 0.3s;
  transition: opacity 0.4s 0.3s;
}
.jawBoneOpen .title-card-tall-panel .tall-panel-bob-container,
.jawBoneOpen .title-card-tall-panel .video-artwork-tall {
  -webkit-transition: padding 0.4s, opacity 0.6s;
  -o-transition: padding 0.4s, opacity 0.6s;
  -moz-transition: padding 0.4s, opacity 0.6s;
  transition: padding 0.4s, opacity 0.6s;
  padding: 28.125% 0;
  opacity: 0;
  pointer-events: none;
}
.jawBoneOpen .title-card-tall-panel.is-focused .video-artwork-tall {
  visibility: hidden;
}
.error-title-card {
  cursor: default;
}
@-webkit-keyframes bob-burnsEffectLeft {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -webkit-transform: translate3d(-8px, 6px, 0) scale(1.06);
    transform: translate3d(-8px, 6px, 0) scale(1.06);
  }
}
@-moz-keyframes bob-burnsEffectLeft {
  0% {
    opacity: 0;
    -moz-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -moz-transform: translate3d(-8px, 6px, 0) scale(1.06);
    transform: translate3d(-8px, 6px, 0) scale(1.06);
  }
}
@-o-keyframes bob-burnsEffectLeft {
  0% {
    opacity: 0;
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    transform: translate3d(-8px, 6px, 0) scale(1.06);
  }
}
@keyframes bob-burnsEffectLeft {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0) scale(1);
    -moz-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -webkit-transform: translate3d(-8px, 6px, 0) scale(1.06);
    -moz-transform: translate3d(-8px, 6px, 0) scale(1.06);
    transform: translate3d(-8px, 6px, 0) scale(1.06);
  }
}
@-webkit-keyframes bob-burnsEffectRight {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -webkit-transform: translate3d(8px, 6px, 0) scale(1.06);
    transform: translate3d(8px, 6px, 0) scale(1.06);
  }
}
@-moz-keyframes bob-burnsEffectRight {
  0% {
    opacity: 0;
    -moz-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -moz-transform: translate3d(8px, 6px, 0) scale(1.06);
    transform: translate3d(8px, 6px, 0) scale(1.06);
  }
}
@-o-keyframes bob-burnsEffectRight {
  0% {
    opacity: 0;
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    transform: translate3d(8px, 6px, 0) scale(1.06);
  }
}
@keyframes bob-burnsEffectRight {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0) scale(1);
    -moz-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -webkit-transform: translate3d(8px, 6px, 0) scale(1.06);
    -moz-transform: translate3d(8px, 6px, 0) scale(1.06);
    transform: translate3d(8px, 6px, 0) scale(1.06);
  }
}
@-webkit-keyframes jaw-burnsEffectLeft {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -webkit-transform: translate3d(-14px, 8px, 0) scale(1.05);
    transform: translate3d(-14px, 8px, 0) scale(1.05);
  }
}
@-moz-keyframes jaw-burnsEffectLeft {
  0% {
    opacity: 0;
    -moz-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -moz-transform: translate3d(-14px, 8px, 0) scale(1.05);
    transform: translate3d(-14px, 8px, 0) scale(1.05);
  }
}
@-o-keyframes jaw-burnsEffectLeft {
  0% {
    opacity: 0;
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    transform: translate3d(-14px, 8px, 0) scale(1.05);
  }
}
@keyframes jaw-burnsEffectLeft {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0) scale(1);
    -moz-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -webkit-transform: translate3d(-14px, 8px, 0) scale(1.05);
    -moz-transform: translate3d(-14px, 8px, 0) scale(1.05);
    transform: translate3d(-14px, 8px, 0) scale(1.05);
  }
}
@-webkit-keyframes jaw-burnsEffectRight {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -webkit-transform: translate3d(14px, 8px, 0) scale(1.05);
    transform: translate3d(14px, 8px, 0) scale(1.05);
  }
}
@-moz-keyframes jaw-burnsEffectRight {
  0% {
    opacity: 0;
    -moz-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -moz-transform: translate3d(14px, 8px, 0) scale(1.05);
    transform: translate3d(14px, 8px, 0) scale(1.05);
  }
}
@-o-keyframes jaw-burnsEffectRight {
  0% {
    opacity: 0;
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    transform: translate3d(14px, 8px, 0) scale(1.05);
  }
}
@keyframes jaw-burnsEffectRight {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, 0, 0) scale(1);
    -moz-transform: translate3d(0, 0, 0) scale(1);
    transform: translate3d(0, 0, 0) scale(1);
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
    -webkit-transform: translate3d(14px, 8px, 0) scale(1.05);
    -moz-transform: translate3d(14px, 8px, 0) scale(1.05);
    transform: translate3d(14px, 8px, 0) scale(1.05);
  }
}
.image-rotator {
  position: relative;
  overflow: hidden;
}
.image-rotator .image-rotator-image {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  -moz-background-size: cover;
  background-size: cover;
  opacity: 0;
}
.image-rotator .image-rotator-image.preload-image {
  opacity: 0.35;
}
.maturity-rating {
  display: inline-block;
}
.maturity-rating .maturity-number {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  text-transform: uppercase;
  border: 1px solid #333;
  padding: 0 5px;
  unicode-bidi: normal; /*!rtl:plaintext*/
  white-space: nowrap;
}
.maturity-rating .maturity-custom-styling,
.maturity-rating .maturity-reason {
  vertical-align: middle;
  font-size: 1.2em;
}
.maturity-rating .maturity-custom-styling:not(:last-child),
.maturity-rating .maturity-reason:not(:last-child) {
  margin: 0 0.2em 0 0;
}
.maturity-rating .maturity-custom-styling:before,
.maturity-rating .maturity-reason:before {
  vertical-align: 8%;
}
.maturity-rating.inline-rating {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.maturity-rating .svg-icon {
  width: 2em;
  height: 2em;
  margin: 0 0.4em 0 0;
  vertical-align: middle;
}
.complex-maturity-advisories {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}
.complex-maturity-advisories .maturity-reason-container {
  padding-top: 5px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 50%;
  -moz-box-flex: 0;
  -ms-flex: 0 0 50%;
  flex: 0 0 50%;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.complex-maturity-advisories .svg-icon {
  width: 2em;
  height: 2em;
  margin: 0 0.4em 0 0;
  vertical-align: middle;
}
.maturity-rating-BR {
  font-family: "Arial Narrow", Arial, sans-serif;
  color: #fff;
  display: inline-block;
  -webkit-border-radius: 0.15em;
  -moz-border-radius: 0.15em;
  border-radius: 0.15em;
  padding: 0.15em 0.1em 0.15em 0;
  text-align: center;
  width: 1.3em;
  font-weight: 700;
  letter-spacing: -0.05em;
}
.maturity-rating-BR.maturity-rating-BR-L {
  background-color: #00af51;
}
.maturity-rating-BR.maturity-rating-BR-10 {
  background-color: #0cf;
}
.maturity-rating-BR.maturity-rating-BR-12 {
  background-color: #fc0;
}
.maturity-rating-BR.maturity-rating-BR-14 {
  background-color: #f60;
}
.maturity-rating-BR.maturity-rating-BR-16 {
  background-color: #fe0000;
}
.maturity-rating-BR.maturity-rating-BR-18 {
  background-color: #000;
}
.maturity-rating-BR.maturity-rating-BR-ER {
  background-color: #fff;
  color: #000;
  border: 0.1em solid #000;
}
.maturity-rating-GB {
  display: inline-block;
  border: none;
  width: 33px;
  height: 25px;
  background: transparent
    url(https://assets.nflxext.com/en_us/icons/maturity_ratings/bbfc_gbguidance_ratings_icons_sprite.png)
    no-repeat top left;
  padding: 0;
  margin-bottom: -6px;
  background-position: 0 -320px;
}
.maturity-rating-GB.maturity-rating-GB-U {
  background-position: 0 -240px;
}
.maturity-rating-GB.maturity-rating-GB-PG {
  background-position: 0 -160px;
}
.maturity-rating-GB.maturity-rating-GB-12 {
  background-position: 0 -40px;
}
.maturity-rating-GB.maturity-rating-GB-15 {
  background-position: 0 -80px;
}
.maturity-rating-GB.maturity-rating-GB-18 {
  background-position: 0 -120px;
}
.maturity-rating-GB.maturity-rating-GB-R18 {
  background-position: 0 -200px;
}
.maturity-rating-GB.maturity-rating-GB-G {
  background-position: 0 -280px;
}
.thumbs-overview-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.thumbs-component {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  pointer-events: none;
}
.thumbs-component .nf-svg-button svg {
  width: 1em;
  height: 1em;
}
.thumbs-component .thumb use {
  pointer-events: none;
}
.thumbs-component .thumb-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  cursor: pointer;
  color: #fff;
  position: relative;
  pointer-events: auto;
}
.thumbs-component .clear-rating {
  margin-left: 8px;
  margin-top: -2px;
  font-size: 24pt;
  font-family: times serif;
}
.thumbs-component.thumbs-vertical {
  display: block;
}
.thumbs-component.animated.thumbs-vertical {
  display: block;
}
.thumbs-component.animated.thumbs-vertical.rated .thumb-up-container {
  -webkit-transform: translate(0, 2.4em);
  -moz-transform: translate(0, 2.4em);
  -ms-transform: translate(0, 2.4em);
  -o-transform: translate(0, 2.4em);
  transform: translate(0, 2.4em);
  -webkit-transition: opacity 150ms linear 550ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: opacity 150ms linear 550ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -o-transition: opacity 150ms linear 550ms,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -moz-transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 550ms,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 550ms;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 550ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
}
.thumbs-component.animated.thumbs-vertical.unrated .thumb-up-container {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);
  -webkit-transition: opacity 150ms linear 650ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: opacity 150ms linear 650ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -o-transition: opacity 150ms linear 650ms,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -moz-transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 650ms,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 650ms;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 650ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
}
.thumbs-component.animated.thumbs-horizontal.rated .thumb-down-container {
  -webkit-transform: translate(-2.4em, 0);
  -moz-transform: translate(-2.4em, 0);
  -ms-transform: translate(-2.4em, 0);
  -o-transform: translate(-2.4em, 0);
  transform: translate(-2.4em, 0);
  -webkit-transition: opacity 150ms linear 550ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: opacity 150ms linear 550ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -o-transition: opacity 150ms linear 550ms,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -moz-transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 550ms,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 550ms;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 550ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
}
.thumbs-component.animated.thumbs-horizontal.unrated .thumb-down-container {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);
  -webkit-transition: opacity 150ms linear 650ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: opacity 150ms linear 650ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -o-transition: opacity 150ms linear 650ms,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -moz-transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 650ms,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 650ms;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 650ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
}
.thumbs-component.animated.thumbs-horizontal-align-right.rated
  .thumb-up-container {
  -webkit-transform: translate(2.4em, 0);
  -moz-transform: translate(2.4em, 0);
  -ms-transform: translate(2.4em, 0);
  -o-transform: translate(2.4em, 0);
  transform: translate(2.4em, 0);
  -webkit-transition: opacity 150ms linear 550ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: opacity 150ms linear 550ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -o-transition: opacity 150ms linear 550ms,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -moz-transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 550ms,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 550ms;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 550ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
}
.thumbs-component.animated.thumbs-horizontal-align-right.unrated
  .thumb-up-container {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);
  -webkit-transition: opacity 150ms linear 650ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: opacity 150ms linear 650ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -o-transition: opacity 150ms linear 650ms,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -moz-transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 650ms,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 650ms;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    opacity 150ms linear 650ms,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
}
.thumbs-component.animated.rated-down .thumb-up-container,
.thumbs-component.animated.rated-up .thumb-down-container {
  opacity: 0;
  z-index: -1;
  -webkit-transition: opacity 150ms linear 550ms;
  -o-transition: opacity 150ms linear 550ms;
  -moz-transition: opacity 150ms linear 550ms;
  transition: opacity 150ms linear 550ms;
}
.thumbs-component.animated.unrated .thumb-container {
  opacity: 1;
  -webkit-transition: opacity 150ms linear 650ms;
  -o-transition: opacity 150ms linear 650ms;
  -moz-transition: opacity 150ms linear 650ms;
  transition: opacity 150ms linear 650ms;
}
.meta .rating-wrapper {
  color: #fff;
}
.meta .rating-wrapper .rating-inner {
  -webkit-transition: margin-right 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s;
  -o-transition: margin-right 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s;
  -moz-transition: margin-right 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s;
  transition: margin-right 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s;
  margin-right: 0.6em;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.meta .rating-wrapper.no-rating .rating-inner {
  -webkit-transition: margin-right 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s;
  -o-transition: margin-right 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s;
  -moz-transition: margin-right 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s;
  transition: margin-right 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s;
  margin-right: 0;
}
.meta .rating-wrapper .show-thumb-up .match-score {
  max-width: 0;
  opacity: 0;
  -webkit-transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  -o-transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  -moz-transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
}
.meta .rating-wrapper .show-thumb-up .thumb-down svg {
  width: 0;
  opacity: 0;
  -webkit-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  -o-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  -moz-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
}
.meta .rating-wrapper .show-thumb-up .thumb-up svg {
  width: 1em;
  opacity: 1;
  -webkit-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
  -o-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
  -moz-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
  transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
}
.meta .rating-wrapper .show-thumb-down .match-score {
  max-width: 0;
  opacity: 0;
  -webkit-transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  -o-transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  -moz-transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
}
.meta .rating-wrapper .show-thumb-down .thumb-up svg {
  width: 0;
  opacity: 0;
  -webkit-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  -o-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  -moz-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
}
.meta .rating-wrapper .show-thumb-down .thumb-down svg {
  width: 1em;
  opacity: 1;
  -webkit-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
  -o-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
  -moz-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
  transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
}
.meta .rating-wrapper .show-match-score .thumb-down svg,
.meta .rating-wrapper .show-match-score .thumb-up svg {
  width: 0;
  opacity: 0;
  -webkit-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  -o-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  -moz-transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
  transition: width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.1s,
    opacity 150ms linear 950ms;
}
.meta .rating-wrapper .show-match-score .match-score {
  max-width: 300px;
  opacity: 1;
  -webkit-transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
  -o-transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
  -moz-transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
  transition: max-width 550ms cubic-bezier(0.86, 0, 0.07, 1) 1.65s,
    opacity 150ms linear 2.2s;
}
.meta .match-score {
  font-weight: 700;
  color: #46d369;
  display: inline-block;
  white-space: nowrap;
}
.meta .meta-thumb-container {
  display: inline-block;
}
.meta .meta-thumb-container svg {
  width: 1em;
  height: 1em;
}
.ratingCTA .label {
  -webkit-transition: opacity 150ms linear 0.5s;
  -o-transition: opacity 150ms linear 0.5s;
  -moz-transition: opacity 150ms linear 0.5s;
  transition: opacity 150ms linear 0.5s;
}
.ratingCTA .unratedLabel {
  position: absolute;
  left: 0;
}
.rated .ratingCTA {
  -webkit-transform: translate(-2.4em, 0);
  -moz-transform: translate(-2.4em, 0);
  -ms-transform: translate(-2.4em, 0);
  -o-transform: translate(-2.4em, 0);
  transform: translate(-2.4em, 0);
  -webkit-transition: -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1)
    0.4s;
  transition: -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -o-transition: -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -moz-transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
}
.rated .ratingCTA .ratedLabel {
  opacity: 1;
}
.rated .ratingCTA .unratedLabel {
  opacity: 0;
}
.unrated .ratingCTA {
  -webkit-transform: translate(0, 0);
  -moz-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  -o-transform: translate(0, 0);
  transform: translate(0, 0);
  -webkit-transition: -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1)
    0.4s;
  transition: -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -o-transition: -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  -moz-transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
  transition: transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -webkit-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -moz-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s,
    -o-transform 550ms cubic-bezier(0.86, 0, 0.07, 1) 0.4s;
}
.unrated .ratingCTA .ratedLabel {
  opacity: 0;
}
.unrated .ratingCTA .unratedLabel {
  opacity: 1;
}
.touchable {
  -ms-touch-action: none;
  touch-action: none;
  -webkit-tap-highlight-color: transparent;
}
.audio-subtitle-controller {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  background: #282828;
}
.audio-subtitle-controller .track-list {
  list-style: none;
  margin: 0;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  padding: 0 0 0.5em 0;
}
.audio-subtitle-controller .track-list li {
  padding: 1em 3.4em 1em 3.4em;
  cursor: pointer;
  white-space: nowrap;
  position: relative;
  font-size: 0.72222222em;
  color: #b3b3b3;
  outline: 0;
}
.audio-subtitle-controller .track-list li:hover {
  background: rgba(255, 255, 255, 0.1);
  color: #fff;
}
.audio-subtitle-controller .track-list li .video-controls-check {
  position: absolute;
  fill: #fff;
  left: 0;
  margin-left: 1.3em;
}
.audio-subtitle-controller .track-list .selected {
  color: #fff;
  font-weight: 600;
}
.audio-subtitle-controller .track-list .list-header {
  cursor: default;
  font-size: 0.94444444em;
  padding: 0.75em 2.6em;
  color: #fff;
  font-weight: 600;
}
.audio-subtitle-controller .track-list .list-header:hover {
  background: 0 0;
}
.bottom-controls .audio-subtitle-controller .track-list {
  padding: 0.5em 0 0.5em 0;
}
.nfp .trickplay {
  pointer-events: none;
  display: none;
  outline: 0;
  position: absolute;
  bottom: 28px;
}
.nfp .trickplay.trickplay-visible {
  display: block;
}
.nfp .trickplay.trickplay-text-and-image {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding-bottom: 0;
  background: rgba(38, 38, 38, 0.85);
  -webkit-box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  -moz-box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
}
.nfp .trickplay.trickplay-text-and-image img {
  display: block;
  width: 100%;
}
.nfp .trickplay.trickplay-text-and-image .tp-text {
  padding: 10px;
  text-align: center;
  font-size: 0.88888889em;
}
.nfp .trickplay.trickplay-text-only {
  text-align: center;
}
.nfp .trickplay.trickplay-text-only .tp-text {
  position: relative;
  left: -50%; /*!rtl:ignore*/
  background: rgba(38, 38, 38, 0.85);
  -webkit-box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  -moz-box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  box-shadow: 0 0 1em rgba(0, 0, 0, 0.5);
  display: inline-block;
  padding: 10px 20px;
  text-align: center;
  margin: 0 auto;
  font-size: 0.88888889em;
}
.nfp .scrubber-container {
  width: 100%;
  -webkit-transition: opacity 0.2s ease;
  -o-transition: opacity 0.2s ease;
  -moz-transition: opacity 0.2s ease;
  transition: opacity 0.2s ease;
  outline: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  cursor: pointer;
  padding: 0 0.83333333em;
  position: relative;
  -ms-touch-action: none;
  touch-action: none;
}
.nfp .scrubber-container:before {
  position: absolute;
  content: "";
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}
.nfp .scrubber-container .scrubber-bar {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  -webkit-flex-shrink: 0;
  -ms-flex-negative: 0;
  flex-shrink: 0;
  width: auto;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  position: relative;
}
.nfp .scrubber-container .track {
  height: 2px;
  background: rgba(255, 255, 255, 0.3);
  position: relative;
  -webkit-transition: -webkit-transform 0.2s ease;
  transition: -webkit-transform 0.2s ease;
  -o-transition: -o-transform 0.2s ease;
  -moz-transition: transform 0.2s ease, -moz-transform 0.2s ease;
  transition: transform 0.2s ease;
  transition: transform 0.2s ease, -webkit-transform 0.2s ease,
    -moz-transform 0.2s ease, -o-transform 0.2s ease;
}
.nfp .scrubber-container .current-progress {
  position: absolute;
  top: 0;
  left: 0; /*!rtl:ignore*/
  width: 0;
  max-width: 100%;
  bottom: 0;
  background: #e50914;
}
.nfp .scrubber-container .buffered {
  position: absolute;
  top: 0;
  left: 0; /*!rtl:ignore*/
  width: 0;
  max-width: 100%;
  bottom: 0;
  background: rgba(255, 255, 255, 0.2);
}
.nfp .scrubber-container .scrubber-head {
  position: absolute;
  top: 50%;
  height: 22px;
  width: 22px;
  margin: -11px;
  background: #e50914;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  opacity: 1;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: -webkit-transform 0.2s ease;
  transition: -webkit-transform 0.2s ease;
  -o-transition: -o-transform 0.2s ease;
  -moz-transition: transform 0.2s ease, -moz-transform 0.2s ease;
  transition: transform 0.2s ease;
  transition: transform 0.2s ease, -webkit-transform 0.2s ease,
    -moz-transform 0.2s ease, -o-transform 0.2s ease;
  -webkit-transform-origin: 50% 50%;
  -moz-transform-origin: 50% 50%;
  -ms-transform-origin: 50% 50%;
  -o-transform-origin: 50% 50%;
  transform-origin: 50% 50%;
  cursor: pointer;
  outline: 0;
}
.nfp .scrubber-container .play-head {
  height: 100%;
  border-left: solid 1px rgba(255, 255, 255, 0.5);
  border-right: solid 1px rgba(255, 255, 255, 0.5);
  margin-left: -1px;
  position: absolute;
  display: none;
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
}
.nfp .is-scrubbing .scrubber-container .track,
.nfp .scrubber-container:hover .track {
  -webkit-transform: scaleY(2);
  -moz-transform: scaleY(2);
  -ms-transform: scaleY(2);
  -o-transform: scaleY(2);
  transform: scaleY(2);
}
.svg-icon {
  width: 1em;
  height: 1em;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  overflow: visible;
  border: solid 1px transparent;
  margin: 0 -1px;
}
.svg-icon.svg-icon-nfplayerPause,
.svg-icon.svg-icon-nfplayerPlay {
  width: 1.05555556em;
  height: 1.22222222em;
}
.svg-icon.svg-icon-volumeLow,
.svg-icon.svg-icon-volumeMax,
.svg-icon.svg-icon-volumeMedium,
.svg-icon.svg-icon-volumeMuted {
  width: 1.33333333em;
  height: 1.11111111em;
}
.svg-icon.svg-icon-nfplayerFullscreen,
.svg-icon.svg-icon-nfplayerWindowed {
  width: 1em;
  height: 1em;
}
.svg-icon.svg-icon-nfplayerSubtitles {
  width: 1.33333333em;
  height: 1.11111111em;
}
.svg-icon.svg-icon-nfplayerEpisodes {
  width: 1.5em;
  height: 1em;
}
.svg-icon.svg-icon-nfplayerNextEpisode {
  width: 0.83333333em;
  height: 1em;
}
.svg-icon.svg-icon-nfplayerBackTen {
  width: 1.11111111em;
  height: 1.33333333em;
}
.svg-icon.svg-icon-nfplayerReplay {
  width: 1.5em;
  height: 1.5em;
}
.svg-icon.svg-icon-nfplayerStop {
  width: 1em;
  height: 1em;
}
.svg-icon.svg-icon-nfplayerMdx,
.svg-icon.svg-icon-nfplayerMdxFull {
  width: 1.22222222em;
  height: 1em;
}
.svg-icon.svg-icon-nfplayerCheck {
  width: 0.94444444em;
  height: 0.83333333em;
}
.svg-icon.svg-icon-nfplayerExit {
  width: 1em;
  height: 1em;
}
.svg-icon.svg-icon-nfplayerBack {
  width: 0.72222222em;
  height: 1em;
}
.svg-icon.svg-icon-nfplayerOpticalCenterPause,
.svg-icon.svg-icon-nfplayerOpticalCenterPlay {
  width: 1.18181818em;
  height: 1em;
}
.svg-icon.svg-icon-playerShare {
  width: 1.22222222em;
  height: 1.33333333em;
}
.nfp-button-control {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  background: 0 0;
  border: 0;
  cursor: pointer;
  outline: 0;
  fill: #fff;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.nfp-button-control.default-control-button {
  padding: 0 0.83333333em;
  height: 3.22222222em;
}
.nfp-button-control.circle-control-button {
  position: relative;
  padding: 0 0.83333333em;
  height: 3.22222222em;
  width: 2em;
}
.nfp-button-control.circle-control-button:before {
  content: "";
  width: 2em;
  height: 2em;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  background: rgba(65, 65, 65, 0.85);
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.nfp-button-control.circle-control-button .svg-icon {
  margin: 0 auto;
  width: 100%;
}
.nfp-popup-control {
  position: relative;
}
.nfp-popup-control .popup-content-wrapper {
  opacity: 0;
  position: absolute;
  right: 0;
  padding: 0 0.83333333em;
  pointer-events: none;
  -webkit-transform: scale(0.95) translateZ(0);
  -moz-transform: scale(0.95) translateZ(0);
  transform: scale(0.95) translateZ(0);
  -webkit-transition: opacity 160ms ease, visibility 0s linear 160ms,
    -webkit-transform 0.2s ease;
  transition: opacity 160ms ease, visibility 0s linear 160ms,
    -webkit-transform 0.2s ease;
  -o-transition: opacity 160ms ease, visibility 0s linear 160ms,
    -o-transform 0.2s ease;
  -moz-transition: opacity 160ms ease, transform 0.2s ease,
    visibility 0s linear 160ms, -moz-transform 0.2s ease;
  transition: opacity 160ms ease, transform 0.2s ease,
    visibility 0s linear 160ms;
  transition: opacity 160ms ease, transform 0.2s ease,
    visibility 0s linear 160ms, -webkit-transform 0.2s ease,
    -moz-transform 0.2s ease, -o-transform 0.2s ease;
  visibility: hidden;
  -webkit-backface-visibility: hidden;
}
.nfp-popup-control .popup-content-wrapper.active {
  opacity: 1;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  pointer-events: auto;
  z-index: 1;
  -webkit-transition-delay: 0s;
  -moz-transition-delay: 0s;
  -o-transition-delay: 0s;
  transition-delay: 0s;
  visibility: visible;
}
.nfp-popup-control .popup-content-wrapper.keep-right {
  left: auto; /*!rtl:ignore*/
  right: 0; /*!rtl:ignore*/
}
.nfp-popup-control .popup-content-wrapper.no-padding {
  padding: 0;
}
.nfp-popup-control .popup-content {
  background: rgba(38, 38, 38, 0.85);
}
.nfp-popup-control--static-position {
  position: static;
}
.popup-content-wrapper--top-placement {
  bottom: 100%;
}
.nfp-control-row.top-left-controls
  .popup-content-wrapper.popup-content-wrapper--fill-screen,
.nfp-control-row.top-right-controls
  .popup-content-wrapper.popup-content-wrapper--fill-screen {
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.nfp-control-row {
  margin: 0.55555556em 0.83333333em;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.nfp-control-row.top-right-controls {
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
}
.nfp-control-row.top-left-controls {
  -webkit-box-pack: start;
  -webkit-justify-content: flex-start;
  -moz-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
}
.nfp-control-row.bottom-right-controls {
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
}
.nfp-control-row.bottom-controls {
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
}
.nfp-control-row.top-left-controls .popup-content-wrapper,
.nfp-control-row.top-right-controls .popup-content-wrapper {
  -webkit-transform-origin: 60% 0;
  -moz-transform-origin: 60% 0;
  -ms-transform-origin: 60% 0;
  -o-transform-origin: 60% 0;
  transform-origin: 60% 0;
}
.nfp-control-row.bottom-controls .popup-content-wrapper,
.nfp-control-row.bottom-right-controls .popup-content-wrapper {
  bottom: 100%;
  -webkit-transform-origin: 60% 100%;
  -moz-transform-origin: 60% 100%;
  -ms-transform-origin: 60% 100%;
  -o-transform-origin: 60% 100%;
  transform-origin: 60% 100%;
}
@-webkit-keyframes flash {
  0% {
    background-color: #ccc;
  }
  100%,
  50% {
    background-color: transparent;
  }
}
@-moz-keyframes flash {
  0% {
    background-color: #ccc;
  }
  100%,
  50% {
    background-color: transparent;
  }
}
@-o-keyframes flash {
  0% {
    background-color: #ccc;
  }
  100%,
  50% {
    background-color: transparent;
  }
}
@keyframes flash {
  0% {
    background-color: #ccc;
  }
  100%,
  50% {
    background-color: transparent;
  }
}
.nfp .skip-credits,
.skip-credits-container-node .skip-credits {
  position: absolute;
  right: 0;
}
.nfp .skip-credits .nf-icon-button,
.skip-credits-container-node .skip-credits .nf-icon-button {
  width: 100%;
  overflow: hidden;
  margin: 0;
  padding: 0;
  display: inline-block;
  position: relative;
  right: 0;
  bottom: 0;
  opacity: 1;
  -webkit-transition: width 650ms cubic-bezier(0.23, 1, 0.32, 1),
    right 650ms cubic-bezier(0.23, 1, 0.32, 1), opacity 325ms linear;
  -o-transition: width 650ms cubic-bezier(0.23, 1, 0.32, 1),
    right 650ms cubic-bezier(0.23, 1, 0.32, 1), opacity 325ms linear;
  -moz-transition: width 650ms cubic-bezier(0.23, 1, 0.32, 1),
    right 650ms cubic-bezier(0.23, 1, 0.32, 1), opacity 325ms linear;
  transition: width 650ms cubic-bezier(0.23, 1, 0.32, 1),
    right 650ms cubic-bezier(0.23, 1, 0.32, 1), opacity 325ms linear;
}
.nfp .skip-credits .nf-flat-button-text,
.skip-credits-container-node .skip-credits .nf-flat-button-text {
  display: inline-block;
  white-space: nowrap;
  padding: 10px;
  -webkit-transform: translateX(0);
  -moz-transform: translateX(0);
  -ms-transform: translateX(0);
  -o-transform: translateX(0);
  transform: translateX(0);
  -webkit-transition: -webkit-transform 650ms cubic-bezier(0.23, 1, 0.32, 1);
  transition: -webkit-transform 650ms cubic-bezier(0.23, 1, 0.32, 1);
  -o-transition: -o-transform 650ms cubic-bezier(0.23, 1, 0.32, 1);
  -moz-transition: transform 650ms cubic-bezier(0.23, 1, 0.32, 1),
    -moz-transform 650ms cubic-bezier(0.23, 1, 0.32, 1);
  transition: transform 650ms cubic-bezier(0.23, 1, 0.32, 1);
  transition: transform 650ms cubic-bezier(0.23, 1, 0.32, 1),
    -webkit-transform 650ms cubic-bezier(0.23, 1, 0.32, 1),
    -moz-transform 650ms cubic-bezier(0.23, 1, 0.32, 1),
    -o-transform 650ms cubic-bezier(0.23, 1, 0.32, 1);
}
.nfp .skip-credits-hidden,
.skip-credits-container-node .skip-credits-hidden {
  pointer-events: none;
  cursor: none;
}
.nfp .skip-credits-hidden .nf-icon-button,
.skip-credits-container-node .skip-credits-hidden .nf-icon-button {
  width: 20%;
  right: -90%;
  opacity: 0;
  -webkit-transition: width 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    right 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    opacity 325ms linear 325ms;
  -o-transition: width 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    right 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    opacity 325ms linear 325ms;
  -moz-transition: width 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    right 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    opacity 325ms linear 325ms;
  transition: width 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    right 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    opacity 325ms linear 325ms;
}
.nfp .skip-credits-hidden .nf-flat-button-text,
.skip-credits-container-node .skip-credits-hidden .nf-flat-button-text {
  -webkit-transform: translateX(-60%);
  -moz-transform: translateX(-60%);
  -ms-transform: translateX(-60%);
  -o-transform: translateX(-60%);
  transform: translateX(-60%);
  -webkit-transition: -webkit-transform 650ms
    cubic-bezier(0.55, 0.055, 0.675, 0.19);
  transition: -webkit-transform 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
  -o-transition: -o-transform 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
  -moz-transition: transform 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    -moz-transform 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
  transition: transform 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
  transition: transform 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    -webkit-transform 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    -moz-transform 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19),
    -o-transform 650ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}
.nfp .skip-credits-flash .nf-icon-button,
.skip-credits-container-node .skip-credits-flash .nf-icon-button {
  -webkit-animation: 1s flash;
  -moz-animation: 1s flash;
  -o-animation: 1s flash;
  animation: 1s flash;
}
.nfp .skip-credits {
  bottom: 3em;
  margin: 0 0.83333333em;
}
.nfp .legacy .skip-credits,
.nfp .multi-line-controls .skip-credits {
  bottom: 6em;
}
.skip-credits-container-node {
  z-index: 2;
}
.skip-credits-container-node .skip-credits {
  z-index: 1;
  bottom: 18em;
  right: 10%;
}
@media screen and (max-width: 1200px) {
  .nfp .skip-credits .nf-icon-button,
  .skip-credits-container-node .skip-credits .nf-icon-button {
    font-size: 12px;
  }
}
.time-remaining--modern {
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  min-width: 2em;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  padding-right: 0.83333333em;
}
.time-remaining--modern .time-remaining__time {
  font-size: 0.88888889em;
}
.time-remaining--classic {
  padding: 0;
  text-align: right; /*!rtl:ignore*/
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
}
.time-remaining--classic .time-remaining__time {
  font-size: 2.4em;
  width: 4em;
  font-weight: 700;
  text-shadow: 0 0 3px rgba(0, 0, 0, 0.5);
}
.nfp .controls {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}
.nfp .controls .kitchen-sink-social-icon:first-of-type {
  margin-right: 30px;
}
.is-scrubbing.nfp .controls .controls-full-hit-zone {
  -webkit-transition: opacity 0.25s ease;
  -o-transition: opacity 0.25s ease;
  -moz-transition: opacity 0.25s ease;
  transition: opacity 0.25s ease;
  opacity: 0;
}
.nfp .controls .progress-control {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: stretch;
  -webkit-align-items: stretch;
  -moz-box-align: stretch;
  -ms-flex-align: stretch;
  align-items: stretch;
  width: 100%;
  min-height: 1.22222222em;
}
.nfp .controls .text-control {
  -webkit-box-flex: 0;
  -webkit-flex-grow: 0;
  -moz-box-flex: 0;
  -ms-flex-positive: 0;
  flex-grow: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.nfp .controls.loading .controls-full-hit-zone {
  -webkit-transition: opacity 0.25s ease;
  -o-transition: opacity 0.25s ease;
  -moz-transition: opacity 0.25s ease;
  transition: opacity 0.25s ease;
  opacity: 0;
}
.nfp .controls.active .gradient-bottom,
.nfp .controls.active .gradient-top,
.nfp .controls.active .recap-lower {
  opacity: 1;
}
.nfp .controls.dimmed:before {
  opacity: 1;
}
.nfp .controls .nfp-popup-control {
  -webkit-transform: none;
  -moz-transform: none;
  -ms-transform: none;
  -o-transform: none;
  transform: none;
}
.nfp .controls .nfp-popup-control .nfp-button-control {
  opacity: 1;
}
.nfp .controls .bottom-controls .nfp-popup-control,
.nfp .controls .top-left-controls .nfp-popup-control,
.nfp .controls .top-right-controls .nfp-popup-control {
  -webkit-transform: none;
  -moz-transform: none;
  -ms-transform: none;
  -o-transform: none;
  transform: none;
}
.nfp .controls-full-hit-zone {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: 0.55555556em 0.83333333em;
}
.nfp .controls-full-hit-zone .center-controls {
  font-size: 2em;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  opacity: 0;
}
.nfp .controls-full-hit-zone .center-controls.active {
  opacity: 1;
}
.PlayerControls--container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  height: 100%;
  width: 100%;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.PlayerControls--static-controls {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.PlayerControls--main-controls {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  height: 100%;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.PlayerControls--first-line-controls {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-align-self: flex-end;
  -ms-flex-item-align: end;
  align-self: flex-end;
  width: 100%;
}
.PlayerControls--low-power {
  display: none;
}
.PlayerControls--control-element {
  opacity: 1;
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
}
.PlayerControls--control-element-blurred {
  opacity: 0.5;
}
.PlayerControls--control-element-blurred:hover {
  opacity: 1;
}
.PlayerControls--control-element-hidden {
  opacity: 0;
  pointer-events: none;
  cursor: none;
}
.PlayerControls--with-dim-background:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  -webkit-transition: opacity 0.25s linear;
  -o-transition: opacity 0.25s linear;
  -moz-transition: opacity 0.25s linear;
  transition: opacity 0.25s linear;
  opacity: 0;
}
.nfp .volume-controller {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  pointer-events: auto;
  cursor: pointer;
}
.nfp .volume-controller .slider-container {
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  border-radius: 2px;
  display: block;
  -webkit-transition: opacity 0.3s ease;
  -o-transition: opacity 0.3s ease;
  -moz-transition: opacity 0.3s ease;
  transition: opacity 0.3s ease;
  outline: 0;
}
.nfp .volume-controller .slider-bar-container {
  position: relative;
  width: 2px;
  height: 6.11111111em;
  margin: 1.38888889em 1.44444444em;
  background: rgba(255, 255, 255, 0.45);
}
.nfp .volume-controller .slider-bar-percentage {
  width: 100%;
  bottom: 0;
  right: 0;
  left: 0;
  background: #fff;
  position: absolute;
}
.nfp .volume-controller .scrubber-target {
  position: absolute;
  left: 0;
  right: 0;
}
.nfp .volume-controller .scrubber-head {
  position: absolute;
  width: 24px;
  height: 24px;
  margin: -12px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  top: 0;
  left: 50%; /*!rtl:ignore*/
  background: #fff;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: -webkit-transform 0.2s ease;
  transition: -webkit-transform 0.2s ease;
  -o-transition: -o-transform 0.2s ease;
  -moz-transition: transform 0.2s ease, -moz-transform 0.2s ease;
  transition: transform 0.2s ease;
  transition: transform 0.2s ease, -webkit-transform 0.2s ease,
    -moz-transform 0.2s ease, -o-transform 0.2s ease;
  outline: 0;
}
.nfp .volume-controller .volume-container-children {
  margin-top: -1.38888889em;
}
@-webkit-keyframes bigPlayPauseOnPause {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(1.25);
    transform: scale(1.25);
    opacity: 0;
  }
}
@-moz-keyframes bigPlayPauseOnPause {
  0% {
    -moz-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  100% {
    -moz-transform: scale(1.25);
    transform: scale(1.25);
    opacity: 0;
  }
}
@-o-keyframes bigPlayPauseOnPause {
  0% {
    -o-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  100% {
    -o-transform: scale(1.25);
    transform: scale(1.25);
    opacity: 0;
  }
}
@keyframes bigPlayPauseOnPause {
  0% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(1.25);
    -moz-transform: scale(1.25);
    -o-transform: scale(1.25);
    transform: scale(1.25);
    opacity: 0;
  }
}
@-webkit-keyframes bigPlayPauseOnPlay {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(1.25);
    transform: scale(1.25);
    opacity: 0;
  }
}
@-moz-keyframes bigPlayPauseOnPlay {
  0% {
    -moz-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  100% {
    -moz-transform: scale(1.25);
    transform: scale(1.25);
    opacity: 0;
  }
}
@-o-keyframes bigPlayPauseOnPlay {
  0% {
    -o-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  100% {
    -o-transform: scale(1.25);
    transform: scale(1.25);
    opacity: 0;
  }
}
@keyframes bigPlayPauseOnPlay {
  0% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(1.25);
    -moz-transform: scale(1.25);
    -o-transform: scale(1.25);
    transform: scale(1.25);
    opacity: 0;
  }
}
.nf-big-play-pause {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.nf-big-play-pause button {
  position: relative;
  border: none;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.4);
  font-size: 1em;
  width: 2.5em;
  height: 2.5em;
  padding: 0;
  outline: 0;
  -webkit-animation-duration: 750ms;
  -moz-animation-duration: 750ms;
  -o-animation-duration: 750ms;
  animation-duration: 750ms;
  -webkit-animation-timing-function: ease-out;
  -moz-animation-timing-function: ease-out;
  -o-animation-timing-function: ease-out;
  animation-timing-function: ease-out;
  cursor: pointer;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: -webkit-transform 0.2s;
  transition: -webkit-transform 0.2s;
  -o-transition: -o-transform 0.2s;
  -moz-transition: transform 0.2s, -moz-transform 0.2s;
  transition: transform 0.2s;
  transition: transform 0.2s, -webkit-transform 0.2s, -moz-transform 0.2s,
    -o-transform 0.2s;
}
:hover.grow.nf-big-play-pause button {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
}
.animate.nf-big-play-pause button {
  opacity: 0;
  cursor: auto;
}
.pause.animate.nf-big-play-pause button {
  -webkit-animation-name: bigPlayPauseOnPause;
  -moz-animation-name: bigPlayPauseOnPause;
  -o-animation-name: bigPlayPauseOnPause;
  animation-name: bigPlayPauseOnPause;
}
.play.animate.nf-big-play-pause button {
  -webkit-animation-name: bigPlayPauseOnPlay;
  -moz-animation-name: bigPlayPauseOnPlay;
  -o-animation-name: bigPlayPauseOnPlay;
  animation-name: bigPlayPauseOnPlay;
}
.nf-big-play-pause button .svg-icon-nfplayerOpticalCenterPause,
.nf-big-play-pause button .svg-icon-nfplayerOpticalCenterPlay {
  position: absolute;
  fill: #fff;
  opacity: 0.7;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  margin: auto;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  width: 50%;
  height: 100%;
}
.nf-big-play-pause.size-small {
  font-size: 1em;
}
.nf-big-play-pause.size-medium {
  font-size: 2em;
}
.nf-big-play-pause.size-large {
  font-size: 3em;
}
.nf-big-play-pause.cursor-pointer {
  cursor: pointer;
}
.Progress {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border: none;
  direction: ltr; /*!rtl:ignore*/
}
.Progress.Progress--modern {
  position: absolute;
  height: 0.11111111em;
  left: 0.27777778em;
  right: 0.27777778em;
  width: 7.77777778em;
  bottom: -1px;
  color: #e50914;
  background-color: rgba(128, 128, 128, 0.5);
}
.Progress.Progress--modern::-webkit-progress-value {
  background: #e50914;
}
.Progress.Progress--modern::-moz-progress-bar {
  background: #e50914;
}
.Progress.Progress--modern::-webkit-progress-bar {
  background: rgba(128, 128, 128, 0.5);
}
.Progress.Progress--classic {
  width: 5.5em;
  margin: 0 0 0 1em;
  color: gray;
  background-color: #000;
}
.Progress.Progress--classic::-webkit-progress-value {
  background: gray;
}
.Progress.Progress--classic::-moz-progress-bar {
  background: gray;
}
.Progress.Progress--classic::-webkit-progress-bar {
  background: #000;
}
.nfp-episode-preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  width: 100%;
  padding: 0.77777778em 0;
  -webkit-box-align: start;
  -webkit-align-items: flex-start;
  -moz-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  overflow: hidden;
}
.nfp-episode-preview.can-play,
.nfp-episode-preview.collapsed {
  cursor: pointer;
}
.nfp-episode-preview:hover {
  background: rgba(255, 255, 255, 0.1);
}
.nfp-episode-preview.expanded {
  background: rgba(0, 0, 0, 0.5);
}
.nfp-episode-preview.expanded .thumbnail .Progress {
  bottom: 0.27777778em;
}
.nfp-episode-preview .number,
.nfp-episode-preview .thumbnail {
  -webkit-box-flex: 0;
  -webkit-flex: none;
  -moz-box-flex: 0;
  -ms-flex: none;
  flex: none;
}
.nfp-episode-preview .title-and-synopsis {
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 auto;
  -moz-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
}
.nfp-episode-preview .synopsis,
.nfp-episode-preview .title {
  font-size: 0.72222222em;
}
.nfp-episode-preview .number {
  font-size: 0.72222222em;
  font-weight: 700;
  padding: 0 1.23076923em 0 0.84615385em;
  width: 1.30769231em;
  text-align: right;
}
.nfp-episode-preview .title {
  margin: 0;
  line-height: normal;
}
.nfp-episode-preview .synopsis {
  margin: 0.16666667em 0;
}
.nfp-episode-preview .thumbnail {
  width: 8.33333333em;
  min-height: 0.44444444em;
  margin: 0 0.77777778em 0 0.55555556em;
  position: relative;
}
.nfp-episode-preview .thumbnail .thumbnail-image {
  width: 100%;
  padding-top: 56%;
  -moz-background-size: contain;
  background-size: contain;
}
.nfp-episode-preview .thumbnail .gradient {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  height: 40%;
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(rgba(0, 0, 0, 0)),
    to(rgba(0, 0, 0, 0.6))
  );
  background: -webkit-linear-gradient(
    top,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.6)
  );
  background: -moz-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6));
  background: -o-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6));
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6));
}
.nfp-episode-preview .thumbnail .nf-big-play-pause {
  opacity: 0.6;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  -webkit-transition: opacity 0.2s, -webkit-transform 0.2s;
  transition: opacity 0.2s, -webkit-transform 0.2s;
  -o-transition: opacity 0.2s, -o-transform 0.2s;
  -moz-transition: transform 0.2s, opacity 0.2s, -moz-transform 0.2s;
  transition: transform 0.2s, opacity 0.2s;
  transition: transform 0.2s, opacity 0.2s, -webkit-transform 0.2s,
    -moz-transform 0.2s, -o-transform 0.2s;
}
.nfp-episode-preview .thumbnail .nf-big-play-pause button {
  background-color: rgba(0, 0, 0, 0.6);
}
.nfp-episode-preview .thumbnail .nf-big-play-pause .svg-icon {
  opacity: 1;
}
.nfp-episode-preview:hover .nf-big-play-pause {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
  opacity: 1;
}
.hiddenEpisodeNumbers .number {
  width: 0;
  padding-left: 0.22222222em;
}
.nfp-episode-expander {
  position: relative;
  overflow: hidden;
  outline: 0;
}
.nfp-episode-expander.transitioning {
  -webkit-transition: height 0.2s;
  -o-transition: height 0.2s;
  -moz-transition: height 0.2s;
  transition: height 0.2s;
}
.nfp-episode-expander > .episode-row {
  width: 100%;
  opacity: 0;
  -webkit-transition: opacity 0.2s;
  -o-transition: opacity 0.2s;
  -moz-transition: opacity 0.2s;
  transition: opacity 0.2s;
}
.nfp-episode-expander > .episode-row.out-of-flow {
  position: absolute;
  top: 0;
}
.nfp-episode-expander > .episode-row.visible {
  opacity: 1;
  z-index: 1;
}
.nfp-episode-expander .focus-rect {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  pointer-events: none;
}
.nfp-season-preview {
  cursor: pointer;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  padding: 0.66666667em 0;
  position: relative;
}
.nfp-season-preview:hover {
  background: rgba(255, 255, 255, 0.1);
}
.nfp-season-preview:hover .arrow {
  visibility: visible;
}
.nfp-season-preview .arrow,
.nfp-season-preview .check {
  -webkit-box-flex: 0;
  -webkit-flex: none;
  -moz-box-flex: 0;
  -ms-flex: none;
  flex: none;
  fill: #fff;
  width: 2.44444444em;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.nfp-season-preview .check {
  -webkit-transform: scale(0.9);
  -moz-transform: scale(0.9);
  -ms-transform: scale(0.9);
  -o-transform: scale(0.9);
  transform: scale(0.9);
}
.nfp-season-preview .arrow {
  visibility: hidden;
  -webkit-transform: scale(0.7) rotate(180deg); /*!rtl:scale(0.7) rotate(0)*/
  -moz-transform: scale(0.7) rotate(180deg); /*!rtl:scale(0.7) rotate(0)*/
  -ms-transform: scale(0.7) rotate(180deg); /*!rtl:scale(0.7) rotate(0)*/
  -o-transform: scale(0.7) rotate(180deg); /*!rtl:scale(0.7) rotate(0)*/
  transform: scale(0.7) rotate(180deg); /*!rtl:scale(0.7) rotate(0)*/
}
.nfp-season-preview .title {
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 auto;
  -moz-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  font-size: 0.94444444em;
  font-weight: 500;
}
.nfp .episode-list {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  height: 22.94444444em;
  width: 25.55555556em;
}
.nfp .episode-list .header {
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  cursor: pointer;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
  height: 2.44444444em;
  position: relative;
  width: 100%;
}
.nfp .episode-list .header:hover {
  background: rgba(255, 255, 255, 0.1);
}
.nfp .episode-list .header.disable-back {
  background: 0 0;
  cursor: auto;
  padding-left: 1.11111111em;
}
.nfp .episode-list .header.disable-back .back {
  display: none;
}
.nfp .episode-list .back {
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  fill: #fff;
  -webkit-box-flex: 0;
  -webkit-flex: none;
  -moz-box-flex: 0;
  -ms-flex: none;
  flex: none;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-transform: scale(0.7) rotate(0); /*!rtl:scale(0.7) rotate(180deg)*/
  -moz-transform: scale(0.7) rotate(0); /*!rtl:scale(0.7) rotate(180deg)*/
  -ms-transform: scale(0.7) rotate(0); /*!rtl:scale(0.7) rotate(180deg)*/
  -o-transform: scale(0.7) rotate(0); /*!rtl:scale(0.7) rotate(180deg)*/
  transform: scale(0.7) rotate(0); /*!rtl:scale(0.7) rotate(180deg)*/
  width: 2.44444444em;
}
.nfp .episode-list .header-title {
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 auto;
  -moz-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  font-size: 0.94em;
  font-weight: 500;
  margin: 0;
  margin-left: -1px;
}
.nfp .episode-list .body {
  direction: ltr;
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 auto;
  -moz-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  overflow-y: auto;
  position: relative;
  width: 100%;
}
.nfp-episode-selector {
  color: #fff;
  position: relative;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
.nfp-episode-selector.transitioning {
  -webkit-transition: height 0.3s, width 0.3s;
  -o-transition: height 0.3s, width 0.3s;
  -moz-transition: height 0.3s, width 0.3s;
  transition: height 0.3s, width 0.3s;
}
.nfp-episode-selector .season-list {
  width: 25.55555556em;
  height: 22.94444444em;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.nfp-episode-selector .season-list .body {
  -webkit-box-flex: 1;
  -webkit-flex: 1 1 auto;
  -moz-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  overflow-y: auto;
  position: relative;
  width: 100%;
}
.nfp-episode-selector.top-aligned .episode-list,
.nfp-episode-selector.top-aligned .season-list {
  height: auto;
  max-height: 22.94444444em;
}
.nfp-episode-selector .pane {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  opacity: 0;
  -webkit-transition: opacity 0.3s, -webkit-transform 0.3s;
  transition: opacity 0.3s, -webkit-transform 0.3s;
  -o-transition: opacity 0.3s, -o-transform 0.3s;
  -moz-transition: transform 0.3s, opacity 0.3s, -moz-transform 0.3s;
  transition: transform 0.3s, opacity 0.3s;
  transition: transform 0.3s, opacity 0.3s, -webkit-transform 0.3s,
    -moz-transform 0.3s, -o-transform 0.3s;
}
.nfp-episode-selector .pane.active {
  opacity: 1;
  z-index: 1;
  -webkit-transform: translateX(0);
  -moz-transform: translateX(0);
  -ms-transform: translateX(0);
  -o-transform: translateX(0);
  transform: translateX(0);
}
.nfp-episode-selector > .out-of-flow {
  position: absolute;
  bottom: 0;
}
.nfp-episode-selector.top-aligned > .out-of-flow {
  top: 0;
  bottom: auto;
}
.nfp-episode-selector .seasons-pane {
  -webkit-transform: translateX(-33%);
  -moz-transform: translateX(-33%);
  -ms-transform: translateX(-33%);
  -o-transform: translateX(-33%);
  transform: translateX(-33%);
}
.nfp-episode-selector .episodes-pane {
  -webkit-transform: translateX(100%);
  -moz-transform: translateX(100%);
  -ms-transform: translateX(100%);
  -o-transform: translateX(100%);
  transform: translateX(100%);
}
.nfp-episode-selector .of-hidden {
  overflow: hidden;
  width: 25.55555556em;
  height: 22.94444444em;
}
.nfp-episode-selector .show-title {
  padding: 0.8em;
  margin: 0;
}
.nfp .next-episode.popup-content {
  width: 22.22222222em;
  cursor: pointer;
  position: relative;
}
.nfp .next-episode.popup-content > .header {
  padding: 0.75em 0.83333333em;
}
.nfp .next-episode.popup-content > .header > .header-title {
  margin: 0;
  font-size: 0.94444444em;
  font-weight: 600;
  color: #fff;
}
.nfp .next-episode.popup-content .episode {
  position: relative;
}
.nfp .next-episode.popup-content .episode img {
  width: 150px;
}
.nfp .player-title-evidence {
  padding: 1.11111111em 0.83333333em;
  will-change: transform;
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
}
.nfp .player-title-evidence .logo {
  display: block;
  max-height: 5em;
  max-width: 15em;
  width: auto;
  height: auto;
  margin: 0 0 0.75em;
}
.nfp .player-title-evidence .title {
  font-weight: 700;
  font-size: 1.25em;
  margin: 0;
}
.nfp .player-title-evidence .playable-title {
  font-size: 0.88888889em;
  font-weight: 400;
  text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
  margin: 0;
  padding: 0;
  max-width: 19.22222222em;
  word-wrap: break-word;
}
.nfp .player-loading {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: #000;
  pointer-events: auto;
}
.nfp .player-loading .gradient {
  position: absolute;
  height: 11.11111111em;
  left: 0;
  top: 0;
  right: 0;
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(rgba(0, 0, 0, 0.65098)),
    to(rgba(0, 0, 0, 0))
  );
  background: -webkit-linear-gradient(
    top,
    rgba(0, 0, 0, 0.65098),
    rgba(0, 0, 0, 0)
  );
  background: -moz-linear-gradient(
    top,
    rgba(0, 0, 0, 0.65098),
    rgba(0, 0, 0, 0)
  );
  background: -o-linear-gradient(top, rgba(0, 0, 0, 0.65098), rgba(0, 0, 0, 0));
  background: linear-gradient(
    to bottom,
    rgba(0, 0, 0, 0.65098),
    rgba(0, 0, 0, 0)
  );
}
.nfp .player-loading .metadata {
  position: absolute;
  left: 2.5em;
  top: 3.5em;
  font-weight: 700;
  color: #e4e4e4;
}
.nfp .player-loading .metadata.logo {
  top: 1.38em;
  padding-top: 3.71em;
  min-width: 8em;
  background-image: url(https://assets.nflxext.com/en_us/pages/wiplayer/logo_v3.svg);
  background-repeat: no-repeat;
  -moz-background-size: 8em 2.33em;
  background-size: 8em 2.33em;
}
.nfp .player-loading .title {
  font-size: 2em;
}
.nfp .player-loading .subtitle {
  font-size: 1.33em;
}
.nfp .player-loading .player-exit {
  position: absolute;
  top: 2.78em;
  right: 2.78em;
  width: 1.4em;
  height: 1.4em;
  -webkit-transition: opacity 0.2s ease-out;
  -o-transition: opacity 0.2s ease-out;
  -moz-transition: opacity 0.2s ease-out;
  transition: opacity 0.2s ease-out;
  color: #fff;
  fill: #fff;
  opacity: 0.5;
  text-decoration: none;
}
.nfp .player-loading .player-exit:hover {
  opacity: 1;
}
.loading-children-container {
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  position: absolute;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
}
.loadingTransition-appear,
.loadingTransition-enter {
  opacity: 0.01;
}
.loadingTransition-appear.loadingTransition-appear-active,
.loadingTransition-enter.loadingTransition-enter-active {
  opacity: 1;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: opacity;
  -o-transition-property: opacity;
  -moz-transition-property: opacity;
  transition-property: opacity;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.loadingTransition-leave {
  opacity: 1;
}
.loadingTransition-leave.loadingTransition-leave-active {
  opacity: 0.01;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: opacity;
  -o-transition-property: opacity;
  -moz-transition-property: opacity;
  transition-property: opacity;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.player-loading-background-image {
  -moz-background-size: cover;
  background-size: cover;
  background-position: 50% 50%;
  -webkit-transition: 0.3s opacity ease-out;
  -o-transition: 0.3s opacity ease-out;
  -moz-transition: 0.3s opacity ease-out;
  transition: 0.3s opacity ease-out;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
.player-loading-background-image-loading {
  opacity: 0;
}
.player-loading-background-image-loaded {
  opacity: 1;
}
.nf-loading-spinner {
  position: absolute;
  left: 1px;
  right: 1px;
  top: 1px;
  bottom: 1px;
  margin: auto;
  text-align: center;
  background-image: url(https://assets.nflxext.com/en_us/pages/wiplayer/site-spinner.png);
  width: 7vh;
  height: 7vh;
  -moz-background-size: 100%;
  background-size: 100%;
  background-repeat: no-repeat;
  -webkit-animation: load_spinner 0.9s linear infinite;
  -moz-animation: load_spinner 0.9s linear infinite;
  -o-animation: load_spinner 0.9s linear infinite;
  animation: load_spinner 0.9s linear infinite;
  min-width: 5rem;
  min-height: 5rem;
}
.PlayerSpinner--container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  width: 7vh;
  height: 7vh;
  min-width: 5rem;
  min-height: 5rem;
}
.PlayerSpinner--percentage {
  -webkit-animation: none;
  -moz-animation: none;
  -o-animation: none;
  animation: none;
  font-weight: 700;
  font-size: 1.4em;
  color: #fff;
  text-shadow: 0 1px 0 #000;
}
@-webkit-keyframes load_spinner {
  0% {
    -webkit-transform: rotateZ(0); /*!rtl:ignore*/
    transform: rotateZ(0); /*!rtl:ignore*/
  }
  50% {
    -webkit-transform: rotateZ(180deg); /*!rtl:ignore*/
    transform: rotateZ(180deg); /*!rtl:ignore*/
  }
  100% {
    -webkit-transform: rotateZ(360deg); /*!rtl:ignore*/
    transform: rotateZ(360deg); /*!rtl:ignore*/
  }
}
@-moz-keyframes load_spinner {
  0% {
    -moz-transform: rotateZ(0); /*!rtl:ignore*/
    transform: rotateZ(0); /*!rtl:ignore*/
  }
  50% {
    -moz-transform: rotateZ(180deg); /*!rtl:ignore*/
    transform: rotateZ(180deg); /*!rtl:ignore*/
  }
  100% {
    -moz-transform: rotateZ(360deg); /*!rtl:ignore*/
    transform: rotateZ(360deg); /*!rtl:ignore*/
  }
}
@-o-keyframes load_spinner {
  0% {
    -o-transform: rotateZ(0); /*!rtl:ignore*/
    transform: rotateZ(0); /*!rtl:ignore*/
  }
  50% {
    -o-transform: rotateZ(180deg); /*!rtl:ignore*/
    transform: rotateZ(180deg); /*!rtl:ignore*/
  }
  100% {
    -o-transform: rotateZ(360deg); /*!rtl:ignore*/
    transform: rotateZ(360deg); /*!rtl:ignore*/
  }
}
@keyframes load_spinner {
  0% {
    -webkit-transform: rotateZ(0); /*!rtl:ignore*/
    -moz-transform: rotateZ(0); /*!rtl:ignore*/
    -o-transform: rotateZ(0); /*!rtl:ignore*/
    transform: rotateZ(0); /*!rtl:ignore*/
  }
  50% {
    -webkit-transform: rotateZ(180deg); /*!rtl:ignore*/
    -moz-transform: rotateZ(180deg); /*!rtl:ignore*/
    -o-transform: rotateZ(180deg); /*!rtl:ignore*/
    transform: rotateZ(180deg); /*!rtl:ignore*/
  }
  100% {
    -webkit-transform: rotateZ(360deg); /*!rtl:ignore*/
    -moz-transform: rotateZ(360deg); /*!rtl:ignore*/
    -o-transform: rotateZ(360deg); /*!rtl:ignore*/
    transform: rotateZ(360deg); /*!rtl:ignore*/
  }
}
.nfp-fatal-error-view {
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 2;
  font-size: 18px;
  background: #000;
}
.nfp-fatal-error-view .button-nfplayerExit {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0.55555556em 0.83333333em;
}
.nfp-fatal-error-view .information {
  z-index: 1;
  width: 100%;
  height: 100%;
  padding: 4em 4em;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.nfp-fatal-error-view .information .error-heading-wrapper {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
.nfp-fatal-error-view .information-wrapper {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
.nfp-fatal-error-view .whoops {
  font-size: 2em;
  font-weight: 300;
  margin: 0 0 1em;
  color: #fff;
  padding: 0;
  -webkit-align-self: flex-end;
  -ms-flex-item-align: end;
  align-self: flex-end;
}
.nfp-fatal-error-view .error-title {
  padding: 0;
  font-size: 1.5em;
  margin: 0;
  font-weight: 600;
}
.nfp-fatal-error-view .error-code {
  font-size: 0.88888889em;
  font-weight: 400;
  margin: 0;
  cursor: text;
  -webkit-user-select: text;
  -moz-user-select: text;
  -ms-user-select: text;
  user-select: text;
  display: block;
}
.nfp-fatal-error-view .error-code span {
  color: #e50914;
}
.nfp-fatal-error-view .error-text,
.nfp-fatal-error-view .player-help-center {
  -webkit-user-select: initial;
  -moz-user-select: initial;
  -ms-user-select: initial;
  user-select: initial;
  font-size: 0.88888889em;
  margin: 1.3em 0 0;
  max-width: 35em;
  color: #ddd;
}
.nfp-fatal-error-view .error-text a,
.nfp-fatal-error-view .player-help-center a {
  color: #fff;
  font-weight: 700;
}
.nfp-fatal-error-view .error-text a:hover,
.nfp-fatal-error-view .player-help-center a:hover {
  text-decoration: underline;
}
.nfp-fatal-error-view .error-text {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
.nfp-fatal-error-view .player-help-center {
  max-width: 40em;
}
.fatal-error-view-secondary-info {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
.fatal-error-view-signout-link {
  margin-top: 1.7em;
  font-weight: 700;
  display: inline-block;
  border: 1px solid rgba(255, 255, 255, 0.4);
  -webkit-transition: background-color 0.1s ease-out;
  -o-transition: background-color 0.1s ease-out;
  -moz-transition: background-color 0.1s ease-out;
  transition: background-color 0.1s ease-out;
  background-color: rgba(0, 0, 0, 0.4);
  padding: 0.5em 2em;
}
.fatal-error-view-signout-link:hover {
  background-color: rgba(77, 77, 77, 0.4);
}
#netflix-player .nfp-player-upsell-view,
.nfp-player-upsell-view {
  height: 100%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 2;
  font-size: 1.5em;
  background: #000;
  color: #fff;
}
#netflix-player .nfp-player-upsell-view .button-nfplayerExit,
.nfp-player-upsell-view .button-nfplayerExit {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0.55555556em 0.83333333em;
}
#netflix-player .nfp-player-upsell-view .information,
.nfp-player-upsell-view .information {
  z-index: 1;
  width: 100%;
  height: 100%;
  padding: 4em 4em;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
#netflix-player .nfp-player-upsell-view .information .upsell-heading-wrapper,
.nfp-player-upsell-view .information .upsell-heading-wrapper {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  -webkit-flex-basis: 0;
  -ms-flex-preferred-size: 0;
  flex-basis: 0;
}
#netflix-player .nfp-player-upsell-view .information-wrapper,
.nfp-player-upsell-view .information-wrapper {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
#netflix-player .nfp-player-upsell-view .upsell-title,
.nfp-player-upsell-view .upsell-title {
  padding: 0;
  font-size: 1.5em;
  margin: 0;
  -webkit-align-self: flex-end;
  -ms-flex-item-align: end;
  align-self: flex-end;
}
#netflix-player .nfp-player-upsell-view .error-code,
.nfp-player-upsell-view .error-code {
  font-size: 0.88888889em;
  font-weight: 400;
  margin: 0;
  cursor: text;
  display: block;
  -webkit-user-select: initial;
  -moz-user-select: initial;
  -ms-user-select: initial;
  user-select: initial;
}
#netflix-player .nfp-player-upsell-view .error-code span,
.nfp-player-upsell-view .error-code span {
  color: #e50914;
}
#netflix-player .nfp-player-upsell-view .upsell-text,
.nfp-player-upsell-view .upsell-text {
  font-size: 0.88888889em;
  margin: 20px 0 0 0;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
#netflix-player .nfp-player-upsell-view .upsell-text a,
.nfp-player-upsell-view .upsell-text a {
  color: #fff;
  font-weight: 700;
}
#netflix-player .nfp-player-upsell-view .upsell-text a:hover,
.nfp-player-upsell-view .upsell-text a:hover {
  text-decoration: underline;
}
#netflix-player .nfp-player-upsell-view .player-upsell-view-secondary-info,
.nfp-player-upsell-view .player-upsell-view-secondary-info {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  -webkit-flex-basis: 0;
  -ms-flex-preferred-size: 0;
  flex-basis: 0;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .upsell-streams,
.nfp-player-upsell-view .player-upsell-view-secondary-info .upsell-streams {
  color: #999;
  margin: 40px 0 0 0;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .upsell-streams
  strong,
.nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .upsell-streams
  strong {
  color: #fff;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-buttons,
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .offer-buttons,
.nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-buttons,
.nfp-player-upsell-view .player-upsell-view-secondary-info .offer-buttons {
  margin-top: 40px;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .offer-buttons,
.nfp-player-upsell-view .player-upsell-view-secondary-info .offer-buttons {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: start;
  -webkit-align-items: flex-start;
  -moz-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .nf-flat-button,
.nfp-player-upsell-view .player-upsell-view-secondary-info .nf-flat-button {
  font-size: 0.9em;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .upgrade-details,
.nfp-player-upsell-view .player-upsell-view-secondary-info .upgrade-details {
  text-align: left;
  width: -webkit-fit-content;
  width: -moz-fit-content;
  width: fit-content;
  background: #191919;
  padding: 10px;
  margin: 10px 10px 0 0;
  font-weight: 700;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .upgrade-details
  p,
.nfp-player-upsell-view .player-upsell-view-secondary-info .upgrade-details p {
  margin: 0;
  padding: 0;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .upgrade-price,
.nfp-player-upsell-view .player-upsell-view-secondary-info .upgrade-price {
  font-weight: 400;
  color: #999;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-details,
.nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-details {
  width: 50%;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-detail,
.nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-detail {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-detail
  > div,
.nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-detail
  > div {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-detail
  .price,
.nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-detail
  .price {
  text-align: right;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-detail
  .date,
.nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-detail
  .date {
  font-size: 0.8em;
  color: #999;
  display: block;
  font-weight: 400;
  margin-top: 5px;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-current-plan,
.nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-current-plan {
  color: #999;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-current-plan
  h2,
.nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-current-plan
  h2 {
  font-weight: 400;
}
#netflix-player
  .nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-new-plan,
.nfp-player-upsell-view
  .player-upsell-view-secondary-info
  .confirmation-new-plan {
  font-weight: 700;
}
#netflix-player .nfp-player-upsell-view .player-upsell-view-secondary-info h2,
.nfp-player-upsell-view .player-upsell-view-secondary-info h2 {
  font-size: 1em;
  margin: 40px 0 6px;
}
.nf-screen-wrapper {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  width: 100%;
  height: 100%;
  background-color: #000;
  position: absolute;
  left: 0;
  top: 0;
  z-index: 3;
  -webkit-animation: fade-in 0.5s;
  -moz-animation: fade-in 0.5s;
  -o-animation: fade-in 0.5s;
  animation: fade-in 0.5s;
}
.nf-screen {
  display: block;
  height: 19.44444444em;
  width: 100%;
  position: relative;
}
.nf-screen .nf-loading-spinner {
  top: 19.44444444em;
}
.nf-screen-logo {
  position: absolute;
  top: 0;
  left: 0; /*!rtl:ignore*/
  right: 0; /*!rtl:ignore*/
  margin: 0 auto; /*!rtl:ignore*/
  width: 28.44444444em;
  height: 7.66666667em;
  background-image: url(https://assets.nflxext.com/en_us/pages/wiplayer/logo_v3.svg);
  -moz-background-size: 100%; /*!rtl:ignore*/
  background-size: 100%; /*!rtl:ignore*/
  background-repeat: no-repeat; /*!rtl:ignore*/
  z-index: 1;
  opacity: 0;
  -webkit-transform: scale(0.7);
  -moz-transform: scale(0.7);
  -ms-transform: scale(0.7);
  -o-transform: scale(0.7);
  transform: scale(0.7);
  -webkit-animation: fade-in 0.7s 0.3s forwards, scale-in 2.5s 0.3s forwards;
  -moz-animation: fade-in 0.7s 0.3s forwards, scale-in 2.5s 0.3s forwards;
  -o-animation: fade-in 0.7s 0.3s forwards, scale-in 2.5s 0.3s forwards;
  animation: fade-in 0.7s 0.3s forwards, scale-in 2.5s 0.3s forwards;
}
.nf-screen-light {
  position: absolute;
  top: 2.22222222em;
  left: 0; /*!rtl:ignore*/
  right: 0; /*!rtl:ignore*/
  margin: 0 auto; /*!rtl:ignore*/
  width: 100%;
  height: 22.05555556em;
  background-image: url(https://assets.nflxext.com/en_us/pages/wiplayer/directional-light.jpg);
  -moz-background-size: contain; /*!rtl:ignore*/
  background-size: contain; /*!rtl:ignore*/
  background-repeat: no-repeat; /*!rtl:ignore*/
  background-position: center; /*!rtl:ignore*/
  z-index: 0;
  -webkit-animation: fade-in 0.5s;
  -moz-animation: fade-in 0.5s;
  -o-animation: fade-in 0.5s;
  animation: fade-in 0.5s;
}
.nf-screen-shadow {
  position: absolute;
  top: 13.33333333em;
  left: 0; /*!rtl:ignore*/
  right: 0; /*!rtl:ignore*/
  margin: 0 auto; /*!rtl:ignore*/
  width: 32.55555556em;
  height: 2.33333333em;
  background-image: url(https://assets.nflxext.com/en_us/pages/wiplayer/shadow.png);
  -moz-background-size: 100%;
  background-size: 100%;
  background-repeat: no-repeat;
  background-position: center;
  z-index: 1;
  -webkit-animation: fade-in 0.7s 0.3s forwards, scale-in 2.5s 0.3s forwards;
  -moz-animation: fade-in 0.7s 0.3s forwards, scale-in 2.5s 0.3s forwards;
  -o-animation: fade-in 0.7s 0.3s forwards, scale-in 2.5s 0.3s forwards;
  animation: fade-in 0.7s 0.3s forwards, scale-in 2.5s 0.3s forwards;
}
@-webkit-keyframes scale-in {
  from {
    -webkit-transform: scale(0.7);
    transform: scale(0.7);
  }
  to {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}
@-moz-keyframes scale-in {
  from {
    -moz-transform: scale(0.7);
    transform: scale(0.7);
  }
  to {
    -moz-transform: scale(1);
    transform: scale(1);
  }
}
@-o-keyframes scale-in {
  from {
    -o-transform: scale(0.7);
    transform: scale(0.7);
  }
  to {
    -o-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes scale-in {
  from {
    -webkit-transform: scale(0.7);
    -moz-transform: scale(0.7);
    -o-transform: scale(0.7);
    transform: scale(0.7);
  }
  to {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
  }
}
@-webkit-keyframes fade-in {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@-moz-keyframes fade-in {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@-o-keyframes fade-in {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@keyframes fade-in {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
.tooltip-button {
  position: relative;
}
.tooltip-button:after {
  content: attr(data-tooltip);
  font-size: 0.7em;
  position: absolute;
  white-space: nowrap;
  visibility: hidden;
  opacity: 0;
  -webkit-transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    margin-left 0.1s linear, margin-right 0.1s linear,
    -webkit-transform 0.1s linear;
  transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    margin-left 0.1s linear, margin-right 0.1s linear,
    -webkit-transform 0.1s linear;
  -o-transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    margin-left 0.1s linear, margin-right 0.1s linear, -o-transform 0.1s linear;
  -moz-transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    transform 0.1s linear, margin-left 0.1s linear, margin-right 0.1s linear,
    -moz-transform 0.1s linear;
  transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    transform 0.1s linear, margin-left 0.1s linear, margin-right 0.1s linear;
  transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    transform 0.1s linear, margin-left 0.1s linear, margin-right 0.1s linear,
    -webkit-transform 0.1s linear, -moz-transform 0.1s linear,
    -o-transform 0.1s linear;
}
.tooltip-button:hover:after {
  visibility: visible;
  opacity: 1;
  -webkit-transition-delay: 0s;
  -moz-transition-delay: 0s;
  -o-transition-delay: 0s;
  transition-delay: 0s;
}
.tooltip-button-before-element-active:before {
  visibility: hidden;
  opacity: 0;
  -webkit-transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    margin-left 0.1s linear, margin-right 0.1s linear,
    -webkit-transform 0.1s linear;
  transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    margin-left 0.1s linear, margin-right 0.1s linear,
    -webkit-transform 0.1s linear;
  -o-transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    margin-left 0.1s linear, margin-right 0.1s linear, -o-transform 0.1s linear;
  -moz-transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    transform 0.1s linear, margin-left 0.1s linear, margin-right 0.1s linear,
    -moz-transform 0.1s linear;
  transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    transform 0.1s linear, margin-left 0.1s linear, margin-right 0.1s linear;
  transition: visibility 0s linear 0.1s, opacity 0.1s linear,
    transform 0.1s linear, margin-left 0.1s linear, margin-right 0.1s linear,
    -webkit-transform 0.1s linear, -moz-transform 0.1s linear,
    -o-transform 0.1s linear;
}
.tooltip-button-before-element-active:hover:before {
  visibility: visible;
  opacity: 1;
  -webkit-transition-delay: 0s;
  -moz-transition-delay: 0s;
  -o-transition-delay: 0s;
  transition-delay: 0s;
}
.tooltip-button-align-center:after {
  -webkit-transform: translateX(-50%); /*!rtl:ignore*/
  -moz-transform: translateX(-50%); /*!rtl:ignore*/
  -ms-transform: translateX(-50%); /*!rtl:ignore*/
  -o-transform: translateX(-50%); /*!rtl:ignore*/
  transform: translateX(-50%); /*!rtl:ignore*/
  left: 50%; /*!rtl:ignore*/
}
.tooltip-button-align-left:after {
  left: 0; /*!rtl:ignore*/
}
.tooltip-button-align-right:after {
  right: 0; /*!rtl:ignore*/
}
.tooltip-button-align-left.tooltip-button-pos-center:after {
  right: 100%; /*!rtl:ignore*/
  left: auto; /*!rtl:ignore*/
}
.tooltip-button-align-right.tooltip-button-pos-center:after {
  left: 100%; /*!rtl:ignore*/
  right: auto; /*!rtl:ignore*/
}
.tooltip-button-pos-bottom:after {
  top: 85%;
}
.tooltip-button-pos-top:after {
  bottom: 85%;
}
.advisory-container {
  width: 100%;
  height: 100%;
  position: absolute;
  opacity: 1;
  -webkit-transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  -o-transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  -moz-transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  z-index: 1;
  top: 0;
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
}
.advisory-container.advisory-hidden {
  opacity: 0;
  z-index: 0;
}
.advisory-background {
  width: 100%;
  height: 100%;
  position: absolute;
  margin: -1em 0;
  background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(50%, rgba(0, 0, 0, 0)),
    to(rgba(0, 0, 0, 0.5))
  ); /*!rtl:ignore*/
  background-image: -webkit-linear-gradient(
    bottom,
    rgba(0, 0, 0, 0) 50%,
    rgba(0, 0, 0, 0.5) 100%
  ); /*!rtl:ignore*/
  background-image: -moz-linear-gradient(
    bottom,
    rgba(0, 0, 0, 0) 50%,
    rgba(0, 0, 0, 0.5) 100%
  ); /*!rtl:ignore*/
  background-image: -o-linear-gradient(
    bottom,
    rgba(0, 0, 0, 0) 50%,
    rgba(0, 0, 0, 0.5) 100%
  ); /*!rtl:ignore*/
  background-image: linear-gradient(
    to top,
    rgba(0, 0, 0, 0) 50%,
    rgba(0, 0, 0, 0.5) 100%
  ); /*!rtl:ignore*/
  opacity: 1;
  -webkit-transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  -o-transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  -moz-transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
}
.advisory {
  position: absolute;
  margin: 1em;
  color: #fff;
  padding: 0.2em 0.4em;
  opacity: 1;
  -webkit-transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  -o-transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  -moz-transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
  transition: opacity 0.5s cubic-bezier(0.5, 0, 0.1, 1);
}
.advisory-bar {
  width: 0.15em;
  position: absolute;
  top: 0;
  right: 100%;
  margin: 0;
  height: 100%;
  background: #e50914;
}
#netflix-player .advisory-header,
.advisory-header {
  font-size: 1em;
  margin: 0 0 0.3em;
  padding: 0;
}
.advisory-body {
  margin: 0;
  padding: 0;
  font-size: 1em;
  opacity: 0.85;
}
.advisory-has-icons .advisory-header {
  font-weight: 400;
}
.advisory-has-icons .advisory-body {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 0;
  -webkit-flex: 0 0 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
  -webkit-box-pack: start;
  -webkit-justify-content: flex-start;
  -moz-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
  -webkit-box-align: start;
  -webkit-align-items: flex-start;
  -moz-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  margin-bottom: 0.3em;
}
.advisory-has-icons .advisory-level-icon {
  width: 4em;
  margin-right: 1em;
}
.advisory-has-icons .advisory-level-icon .svg-icon {
  width: 4em;
  height: 4em;
}
.advisory-has-icons .advisory-icon {
  width: 2.5em;
  margin-right: 0.5em;
  text-align: center;
}
.advisory-has-icons .advisory-icon .svg-icon {
  width: 2.5em;
  height: 2.5em;
}
.advisory-has-icons .advisory-icon-text {
  font-size: 0.6em;
}
.advisory-transition-appear,
.advisory-transition-enter {
  opacity: 0;
}
.advisory-transition-appear .advisory-bar,
.advisory-transition-enter .advisory-bar {
  -webkit-transform: translate3d(0, -0.5em, 0);
  -moz-transform: translate3d(0, -0.5em, 0);
  transform: translate3d(0, -0.5em, 0);
  height: 0;
}
.advisory-transition-appear .advisory-body,
.advisory-transition-appear .advisory-header,
.advisory-transition-enter .advisory-body,
.advisory-transition-enter .advisory-header {
  opacity: 0;
  -webkit-transform: translate3d(0, -0.75em, 0);
  -moz-transform: translate3d(0, -0.75em, 0);
  transform: translate3d(0, -0.75em, 0);
}
.advisory-transition-appear.advisory-transition-appear-active,
.advisory-transition-enter.advisory-transition-enter-active {
  opacity: 1;
}
.advisory-transition-appear.advisory-transition-appear-active .advisory-bar,
.advisory-transition-appear.advisory-transition-appear-active .advisory-body,
.advisory-transition-appear.advisory-transition-appear-active .advisory-header,
.advisory-transition-enter.advisory-transition-enter-active .advisory-bar,
.advisory-transition-enter.advisory-transition-enter-active .advisory-body,
.advisory-transition-enter.advisory-transition-enter-active .advisory-header {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
.advisory-transition-appear.advisory-transition-appear-active .advisory-bar,
.advisory-transition-enter.advisory-transition-enter-active .advisory-bar {
  height: 100%;
  -webkit-transition: height 0.4s cubic-bezier(0, 0, 0.5, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  transition: height 0.4s cubic-bezier(0, 0, 0.5, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  -o-transition: height 0.4s cubic-bezier(0, 0, 0.5, 1),
    -o-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  -moz-transition: transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    height 0.4s cubic-bezier(0, 0, 0.5, 1),
    -moz-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  transition: transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    height 0.4s cubic-bezier(0, 0, 0.5, 1);
  transition: transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    height 0.4s cubic-bezier(0, 0, 0.5, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -moz-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -o-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
}
.advisory-transition-appear.advisory-transition-appear-active .advisory-header,
.advisory-transition-enter.advisory-transition-enter-active .advisory-header {
  opacity: 1;
  -webkit-transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  -o-transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    -o-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  -moz-transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -moz-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -moz-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -o-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
}
.advisory-transition-appear.advisory-transition-appear-active .advisory-body,
.advisory-transition-enter.advisory-transition-enter-active .advisory-body {
  opacity: 0.85;
  -webkit-transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  -o-transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    -o-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  -moz-transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -moz-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  transition: opacity 1s cubic-bezier(0.5, 0, 0.1, 1),
    transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -moz-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -o-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  -webkit-transition-delay: 0.1s;
  -moz-transition-delay: 0.1s;
  -o-transition-delay: 0.1s;
  transition-delay: 0.1s;
}
.advisory-transition-leave {
  opacity: 1;
}
.advisory-transition-leave .advisory-bar,
.advisory-transition-leave .advisory-body,
.advisory-transition-leave .advisory-header {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
.advisory-transition-leave .advisory-bar {
  height: 100%;
}
.advisory-transition-leave .advisory-header {
  opacity: 1;
}
.advisory-transition-leave .advisory-body {
  opacity: 0.85;
}
.advisory-transition-leave.advisory-transition-leave-active {
  opacity: 0;
}
.advisory-transition-leave.advisory-transition-leave-active .advisory-bar {
  height: 0;
  bottom: auto;
  top: 0;
  opacity: 0;
  -webkit-transform: translate3d(0, -0.5em, 0);
  -moz-transform: translate3d(0, -0.5em, 0);
  transform: translate3d(0, -0.5em, 0);
  -webkit-transition: height 0.4s cubic-bezier(0, 0, 0.5, 1),
    opacity 0.83333333s cubic-bezier(0, 0, 0.5, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  transition: height 0.4s cubic-bezier(0, 0, 0.5, 1),
    opacity 0.83333333s cubic-bezier(0, 0, 0.5, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  -o-transition: height 0.4s cubic-bezier(0, 0, 0.5, 1),
    opacity 0.83333333s cubic-bezier(0, 0, 0.5, 1),
    -o-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  -moz-transition: transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    height 0.4s cubic-bezier(0, 0, 0.5, 1),
    opacity 0.83333333s cubic-bezier(0, 0, 0.5, 1),
    -moz-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  transition: transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    height 0.4s cubic-bezier(0, 0, 0.5, 1),
    opacity 0.83333333s cubic-bezier(0, 0, 0.5, 1);
  transition: transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    height 0.4s cubic-bezier(0, 0, 0.5, 1),
    opacity 0.83333333s cubic-bezier(0, 0, 0.5, 1),
    -webkit-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -moz-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1),
    -o-transform 0.83333333s cubic-bezier(0, 0, 0.1, 1);
  -webkit-transition-delay: 0.1s;
  -moz-transition-delay: 0.1s;
  -o-transition-delay: 0.1s;
  transition-delay: 0.1s;
}
.advisory-transition-leave.advisory-transition-leave-active .advisory-body,
.advisory-transition-leave.advisory-transition-leave-active .advisory-header {
  opacity: 0;
  -webkit-transform: translate3d(0, -0.75em, 0);
  -moz-transform: translate3d(0, -0.75em, 0);
  transform: translate3d(0, -0.75em, 0);
  -webkit-transition: opacity 0.5s cubic-bezier(0, 0, 0.5, 1),
    -webkit-transform 0.5s cubic-bezier(0, 0, 1, 0.1);
  transition: opacity 0.5s cubic-bezier(0, 0, 0.5, 1),
    -webkit-transform 0.5s cubic-bezier(0, 0, 1, 0.1);
  -o-transition: opacity 0.5s cubic-bezier(0, 0, 0.5, 1),
    -o-transform 0.5s cubic-bezier(0, 0, 1, 0.1);
  -moz-transition: opacity 0.5s cubic-bezier(0, 0, 0.5, 1),
    transform 0.5s cubic-bezier(0, 0, 1, 0.1),
    -moz-transform 0.5s cubic-bezier(0, 0, 1, 0.1);
  transition: opacity 0.5s cubic-bezier(0, 0, 0.5, 1),
    transform 0.5s cubic-bezier(0, 0, 1, 0.1);
  transition: opacity 0.5s cubic-bezier(0, 0, 0.5, 1),
    transform 0.5s cubic-bezier(0, 0, 1, 0.1),
    -webkit-transform 0.5s cubic-bezier(0, 0, 1, 0.1),
    -moz-transform 0.5s cubic-bezier(0, 0, 1, 0.1),
    -o-transform 0.5s cubic-bezier(0, 0, 1, 0.1);
}
.advisory-transition-leave.advisory-transition-leave-active .advisory-body {
  -webkit-transition-delay: 0.05s;
  -moz-transition-delay: 0.05s;
  -o-transition-delay: 0.05s;
  transition-delay: 0.05s;
}
@-webkit-keyframes shakeit {
  0% {
    -webkit-transform: translateX(-4em);
    transform: translateX(-4em);
  }
  25% {
    -webkit-transform: translateX(4em);
    transform: translateX(4em);
  }
  50% {
    -webkit-transform: translateX(-4em);
    transform: translateX(-4em);
  }
  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
}
@-moz-keyframes shakeit {
  0% {
    -moz-transform: translateX(-4em);
    transform: translateX(-4em);
  }
  25% {
    -moz-transform: translateX(4em);
    transform: translateX(4em);
  }
  50% {
    -moz-transform: translateX(-4em);
    transform: translateX(-4em);
  }
  100% {
    -moz-transform: translateX(0);
    transform: translateX(0);
  }
}
@-o-keyframes shakeit {
  0% {
    -o-transform: translateX(-4em);
    transform: translateX(-4em);
  }
  25% {
    -o-transform: translateX(4em);
    transform: translateX(4em);
  }
  50% {
    -o-transform: translateX(-4em);
    transform: translateX(-4em);
  }
  100% {
    -o-transform: translateX(0);
    transform: translateX(0);
  }
}
@keyframes shakeit {
  0% {
    -webkit-transform: translateX(-4em);
    -moz-transform: translateX(-4em);
    -o-transform: translateX(-4em);
    transform: translateX(-4em);
  }
  25% {
    -webkit-transform: translateX(4em);
    -moz-transform: translateX(4em);
    -o-transform: translateX(4em);
    transform: translateX(4em);
  }
  50% {
    -webkit-transform: translateX(-4em);
    -moz-transform: translateX(-4em);
    -o-transform: translateX(-4em);
    transform: translateX(-4em);
  }
  100% {
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -o-transform: translateX(0);
    transform: translateX(0);
  }
}
.player-pin-entry-validating {
  opacity: 0;
}
.player-pin-entry-container {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
}
.player-pin-entry {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.8);
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-transition: opacity 0.3s ease-out;
  -o-transition: opacity 0.3s ease-out;
  -moz-transition: opacity 0.3s ease-out;
  transition: opacity 0.3s ease-out;
}
.player-pin-entry .pin-input-container {
  -webkit-box-flex: 0;
  -webkit-flex: 0 1 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  color: #000;
  margin: 0.5em;
  direction: ltr; /*!rtl:ignore*/
}
.player-pin-entry .player-pin-reset-link-container {
  -webkit-box-flex: 0;
  -webkit-flex: 0 1 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  padding: 0.75em 0;
  font-size: 1em;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  z-index: 1;
}
.player-pin-entry .player-pin-reset-actions {
  -webkit-box-flex: 0;
  -webkit-flex: 0 1 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  padding: 0.75em 0 1em 0;
  height: 2em;
}
.player-pin-entry .pin-number-input {
  width: 2.5em;
  height: 2.5em;
  font-size: 2.5em;
  padding: 0.2em;
  margin: 0.2em;
  text-align: center;
  border: 0.05em solid #fff;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  background: 0 0;
  color: #fff;
  -webkit-transition: -webkit-transform 0.1s ease-out;
  transition: -webkit-transform 0.1s ease-out;
  -o-transition: -o-transform 0.1s ease-out;
  -moz-transition: transform 0.1s ease-out, -moz-transform 0.1s ease-out;
  transition: transform 0.1s ease-out;
  transition: transform 0.1s ease-out, -webkit-transform 0.1s ease-out,
    -moz-transform 0.1s ease-out, -o-transform 0.1s ease-out;
}
.player-pin-entry .pin-number-input:focus {
  outline: 0;
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
}
.player-pin-entry-title {
  -webkit-box-flex: 0;
  -webkit-flex: 0 1 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  margin: 0.5em 0;
  font-size: 1.7em;
  text-align: center;
  font-weight: 400;
}
.player-pin-entry-invalid {
  -webkit-animation: shakeit 0.3s 1;
  -moz-animation: shakeit 0.3s 1;
  -o-animation: shakeit 0.3s 1;
  animation: shakeit 0.3s 1;
  -webkit-animation-delay: 0.3s;
  -moz-animation-delay: 0.3s;
  -o-animation-delay: 0.3s;
  animation-delay: 0.3s;
}
.player-pin-entry-pad-wrapper {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.pinLoadingTransition-appear,
.pinLoadingTransition-enter {
  opacity: 0.01;
}
.pinLoadingTransition-appear.pinLoadingTransition-appear-active,
.pinLoadingTransition-enter.pinLoadingTransition-enter-active {
  opacity: 1;
  -webkit-transition-duration: 0.15s;
  -moz-transition-duration: 0.15s;
  -o-transition-duration: 0.15s;
  transition-duration: 0.15s;
  -webkit-transition-property: opacity;
  -o-transition-property: opacity;
  -moz-transition-property: opacity;
  transition-property: opacity;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.pinLoadingTransition-leave {
  opacity: 1;
}
.pinLoadingTransition-leave.pinLoadingTransition-leave-active {
  opacity: 0.01;
  -webkit-transition-duration: 0.15s;
  -moz-transition-duration: 0.15s;
  -o-transition-duration: 0.15s;
  transition-duration: 0.15s;
  -webkit-transition-property: opacity;
  -o-transition-property: opacity;
  -moz-transition-property: opacity;
  transition-property: opacity;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.adult-verification-prompt {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  background: rgba(0, 0, 0, 0.8);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
.adult-verification-prompt .adult-verification-header {
  -webkit-box-flex: 0;
  -webkit-flex: 0 1 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  margin: 1em;
  font-size: 2em;
  font-weight: 400;
}
.adult-verification-prompt .adult-verification-actions {
  -webkit-box-flex: 0;
  -webkit-flex: 0 1 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  padding: 1.5em 0 2em 0;
}
.adult-verification-prompt-content {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
.nfp-aspect-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
}
.nfp-aspect-container {
  display: inline-block;
  position: relative;
  width: 100%;
  max-height: 100%;
}
.nfp-aspect-inner {
  padding-top: 56.25%;
  display: block;
  content: "";
}
.ResizingAspect--wrapper {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  width: 100%;
  height: 100%;
}
.ResizingAspect--container {
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.VideoContainer {
  width: 100%;
  height: 100%;
  -webkit-transition: opacity 0.5s linear;
  -o-transition: opacity 0.5s linear;
  -moz-transition: opacity 0.5s linear;
  transition: opacity 0.5s linear;
}
.VideoContainer video {
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto;
  width: 100%;
  height: 100%;
}
.VideoContainer .player-info,
.VideoContainer .player-streams {
  z-index: 3;
}
.VideoContainer--hide-subtitles .player-timedtext {
  display: none !important;
}
.VideoContainer--use-element-dimensions {
  height: auto;
}
.VideoContainer--use-element-dimensions video {
  position: relative;
}
.nfp button,
.nfp div,
.nfp li,
.nfp span {
  outline: 0;
}
.nfp.container-large {
  font-size: 24px;
}
.nfp.container-small {
  font-size: 18px;
}
.nfp.scrubbing-surface {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.nfp.nf-player-container {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background: #000;
  outline: 0;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  overflow: hidden;
  z-index: 1;
}
.nfp.nf-player-container:after {
  visibility: hidden;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  font-family: nf-icon;
  content: "\e641";
}
.nfp.nf-player-container.active {
  cursor: default;
}
.nfp.nf-player-container.inactive {
  cursor: none;
}
.nfp.nf-player-container .player-view-childrens {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
}
.nfp.nf-player-container .player-view-childrens-interactive {
  z-index: 2;
}
.nfp.nf-player-container .svg-icon use {
  pointer-events: none;
}
.nfp.fast-forward .VideoContainer {
  opacity: 0;
}
.nfp.fast-forward .scrubber-head {
  -webkit-transition: left 0.5s ease;
  -o-transition: left 0.5s ease;
  -moz-transition: left 0.5s ease;
  transition: left 0.5s ease;
}
.nfp.fast-forward .current-progress {
  -webkit-transition: width 0.5s ease;
  -o-transition: width 0.5s ease;
  -moz-transition: width 0.5s ease;
  transition: width 0.5s ease;
}
.nfp .nf-play-button {
  width: 7.2vw;
  height: 7.2vw;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  margin: auto;
  z-index: 1;
  cursor: pointer;
}
.nfp .nf-play-button .play-ring {
  width: 100%;
  height: 100%;
  border: 0.36vw solid #fff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
}
.nfp .nf-play-button .play-ring .play.icon-play {
  line-height: 7.2vw;
  width: 100%;
  color: #fff;
  font-size: 3.1vw;
  left: 6%;
  text-align: center;
  position: absolute;
  -webkit-transition: all 150ms ease;
  -o-transition: all 150ms ease;
  -moz-transition: all 150ms ease;
  transition: all 150ms ease;
}
.nfp .nf-play-button:hover .play-ring {
  background: rgba(0, 0, 0, 0.5);
}
.nfp .nf-play-button:hover .play.icon-play {
  color: #b9090b;
}
.nf-kb-nav-wrapper.kb-nav .audio-subtitle-controller .track:focus,
.nf-kb-nav-wrapper.kb-nav .nfp-button-control:focus,
.nf-kb-nav-wrapper.kb-nav .scrubber-head:focus {
  outline: #fff solid 3px;
}
.nf-kb-nav-wrapper.kb-nav .episode-list .header:focus .focus-rect,
.nf-kb-nav-wrapper.kb-nav .nfp-episode-expander:focus .focus-rect,
.nf-kb-nav-wrapper.kb-nav .nfp-season-preview:focus .focus-rect {
  border: #fff solid 3px;
}
.nf-kb-nav-wrapper.kb-nav .episode-list .header:focus .focus-rect,
.nf-kb-nav-wrapper.kb-nav .nfp-season-preview:focus .focus-rect {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  height: 100%;
  left: 0;
  pointer-events: none;
  position: absolute;
  top: 0;
  width: 100%;
}
.NFPlayer {
  height: 100%;
  -webkit-transition: width 0.3s, height 0.3s, top 0.3s, left 0.3s, opacity 0.3s;
  -o-transition: width 0.3s, height 0.3s, top 0.3s, left 0.3s, opacity 0.3s;
  -moz-transition: width 0.3s, height 0.3s, top 0.3s, left 0.3s, opacity 0.3s;
  transition: width 0.3s, height 0.3s, top 0.3s, left 0.3s, opacity 0.3s;
  width: 100%;
}
.NFPlayer.postplay {
  border: 0.15em solid #eee;
  height: 14.16666667em;
  left: 1.5em;
  top: 1.5em;
  width: 22.22222222em;
  z-index: 2;
}
.NFPlayer.postplay.episodicTeaser {
  top: 8em;
}
.NFPlayer.ended .VideoContainer {
  opacity: 0;
}
.NFPlayer.can-resume:hover {
  border: 0.15em solid #fff;
  cursor: pointer;
}
#netflix-player .player-control-bar .player-mdx-2 .button-nfplayerMdx,
#netflix-player .player-control-bar .player-mdx-2 .button-nfplayerMdxFull {
  background: 0 0;
  outline: 0;
  border: 0;
  fill: #999;
  padding: 0 0.55333333em;
}
#netflix-player .player-control-bar .player-mdx-2 .button-nfplayerMdx svg,
#netflix-player .player-control-bar .player-mdx-2 .button-nfplayerMdxFull svg {
  width: 1.30769231em;
  height: 1em;
}
.klayer-ns.controls .button-nfplayerMdx,
.klayer-ns.controls .button-nfplayerMdxFull {
  background: 0 0;
  outline: 0;
  border: 0;
  fill: #fff;
  font-size: 3em;
  height: auto;
  padding: 0 0.5em;
}
.klayer-ns.controls .button-nfplayerMdx svg,
.klayer-ns.controls .button-nfplayerMdxFull svg {
  width: 1.30769231em;
  height: 1em;
}
.klayer-ns.klayer-button .video-controls-mdx {
  font-size: 3em;
  margin-top: 0.25em;
}
.mdx-mount-point.nfp {
  position: fixed;
  bottom: 0;
  width: 100%;
  z-index: 50000;
  color: #ddd;
}
.mdx-mount-point.nfp .mdx-controls-bar-container {
  position: relative;
  height: 0;
  background: #000;
  -webkit-box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.2);
  -moz-box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.2);
  box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.2);
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: reverse;
  -webkit-flex-direction: column-reverse;
  -moz-box-orient: vertical;
  -moz-box-direction: reverse;
  -ms-flex-direction: column-reverse;
  flex-direction: column-reverse;
  -webkit-transition: height 0.5s;
  -o-transition: height 0.5s;
  -moz-transition: height 0.5s;
  transition: height 0.5s;
  outline: 0;
}
.mdx-mount-point.nfp .mdx-controls-bar-container.mdx-connected-state,
.mdx-mount-point.nfp .mdx-controls-bar-container.mdx-play-state,
.mdx-mount-point.nfp .mdx-controls-bar-container.mdx-playback-unavailable,
.mdx-mount-point.nfp .mdx-controls-bar-container.mdx-postplay-state {
  height: auto;
}
.mdx-mount-point.nfp .mdx-controls-bar-container .mdx-controls-trans-appear,
.mdx-mount-point.nfp .mdx-controls-bar-container .mdx-controls-trans-enter {
  opacity: 0.01;
}
.mdx-mount-point.nfp
  .mdx-controls-bar-container
  .mdx-controls-trans-appear.mdx-controls-trans-appear-active,
.mdx-mount-point.nfp
  .mdx-controls-bar-container
  .mdx-controls-trans-enter.mdx-controls-trans-enter-active {
  opacity: 1;
  -webkit-transition: opacity 0.3s ease-out;
  -o-transition: opacity 0.3s ease-out;
  -moz-transition: opacity 0.3s ease-out;
  transition: opacity 0.3s ease-out;
  display: block;
}
.mdx-mount-point.nfp .mdx-controls-bar-container .mdx-controls-trans-leave {
  opacity: 1;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}
.mdx-mount-point.nfp
  .mdx-controls-bar-container
  .mdx-controls-trans-leave.mdx-controls-trans-leave-active {
  opacity: 0.01;
  -webkit-transition: opacity 0.3s ease-in;
  -o-transition: opacity 0.3s ease-in;
  -moz-transition: opacity 0.3s ease-in;
  transition: opacity 0.3s ease-in;
}
.mdx-mount-point.nfp .controls {
  opacity: 1;
  position: relative;
}
.mdx-mount-point.nfp .controls .main-controls {
  display: block;
  padding: 0;
  position: relative;
}
.mdx-mount-point.nfp .controls .main-controls .popup-content {
  background: #1e1e1e;
}
.mdx-mount-point.nfp .controls .main-controls .controls-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  width: auto;
  margin-top: 0;
  padding-right: 0.85em;
  margin-bottom: 0.25em;
  position: relative;
}
.mdx-mount-point.nfp .controls .main-controls .mdx-status-appear,
.mdx-mount-point.nfp .controls .main-controls .mdx-status-enter {
  opacity: 0.01;
  -webkit-transform: translateY(1em);
  -moz-transform: translateY(1em);
  -ms-transform: translateY(1em);
  -o-transform: translateY(1em);
  transform: translateY(1em);
}
.mdx-mount-point.nfp
  .controls
  .main-controls
  .mdx-status-appear.mdx-status-appear-active,
.mdx-mount-point.nfp
  .controls
  .main-controls
  .mdx-status-enter.mdx-status-enter-active {
  opacity: 1;
  -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
  -webkit-transition: opacity 0.3s ease-out, -webkit-transform 0.3s ease-out;
  transition: opacity 0.3s ease-out, -webkit-transform 0.3s ease-out;
  -o-transition: opacity 0.3s ease-out, -o-transform 0.3s ease-out;
  -moz-transition: transform 0.3s ease-out, opacity 0.3s ease-out,
    -moz-transform 0.3s ease-out;
  transition: transform 0.3s ease-out, opacity 0.3s ease-out;
  transition: transform 0.3s ease-out, opacity 0.3s ease-out,
    -webkit-transform 0.3s ease-out, -moz-transform 0.3s ease-out,
    -o-transform 0.3s ease-out;
  display: block;
}
.mdx-mount-point.nfp .controls .main-controls .mdx-status-leave {
  opacity: 1;
  -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}
.mdx-mount-point.nfp
  .controls
  .main-controls
  .mdx-status-leave.mdx-status-leave-active {
  opacity: 0.01;
  -webkit-transform: translateY(-1em);
  -moz-transform: translateY(-1em);
  -ms-transform: translateY(-1em);
  -o-transform: translateY(-1em);
  transform: translateY(-1em);
  -webkit-transition: opacity 0.3s ease-in, -webkit-transform 0.3s ease-in;
  transition: opacity 0.3s ease-in, -webkit-transform 0.3s ease-in;
  -o-transition: opacity 0.3s ease-in, -o-transform 0.3s ease-in;
  -moz-transition: transform 0.3s ease-in, opacity 0.3s ease-in,
    -moz-transform 0.3s ease-in;
  transition: transform 0.3s ease-in, opacity 0.3s ease-in;
  transition: transform 0.3s ease-in, opacity 0.3s ease-in,
    -webkit-transform 0.3s ease-in, -moz-transform 0.3s ease-in,
    -o-transform 0.3s ease-in;
}
.mdx-mount-point.nfp .controls .main-controls .title-name-container {
  padding-top: 1em;
  color: #fff;
  text-align: center;
  white-space: nowrap;
}
.mdx-mount-point.nfp .controls .main-controls .title-name-container a:hover {
  text-decoration: underline;
}
.mdx-mount-point.nfp .mdx-postplay-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  overflow: hidden;
  -webkit-transition: opacity 0.3s, height 0.3s;
  -o-transition: opacity 0.3s, height 0.3s;
  -moz-transition: opacity 0.3s, height 0.3s;
  transition: opacity 0.3s, height 0.3s;
  height: 0;
  opacity: 0;
}
.mdx-mount-point.nfp .mdx-postplay-container.mdx-postplay-showing {
  height: auto;
  opacity: 1;
  margin: 0.5rem 0 0 0;
}
.mdx-mount-point.nfp.hidden {
  display: none;
}
.mdx-mount-point.nfp .connected-status h3 {
  margin: 0;
  text-align: center;
  font-size: 1rem;
  font-weight: 700;
  padding-top: 0.75em;
}
.mdx-mount-point.nfp .connected-status h4 {
  margin: 0;
  text-align: center;
  font-weight: 400;
  padding-bottom: 0.75em;
  padding-top: 0.25em;
}
.mdx-mount-point.nfp .video-controls-mdx {
  fill: #40bcea;
}
.mdx-mount-point.nfp .adult-verification-prompt,
.mdx-mount-point.nfp .player-pin-entry-container {
  position: fixed;
  top: 70px;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
}
.mdx-button.hidden {
  display: none;
}
.mdx-button .video-controls-mdx {
  background: 0 0;
  outline: 0;
  border: 0;
}
.mdx-button .video-controls-mdx svg {
  width: 1.30769231em;
  height: 1em;
}
.mdx-controls-actions-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  margin: 0 0 0.5rem 0;
}
.MdxControls__button {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  background: #333;
  -webkit-border-radius: 0.1em;
  -moz-border-radius: 0.1em;
  border-radius: 0.1em;
  border: 1px solid transparent;
  color: #fff;
  cursor: pointer;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  font-size: 0.8rem;
  font-weight: 700;
  outline: 0;
  padding: 0.5em 1.25em;
  margin: 0.5em;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.MdxControls__button:focus,
.MdxControls__button:hover {
  border: 1px solid rgba(255, 255, 255, 0.75);
}
.MdxControls__button .svg-icon {
  margin-right: 0.5em;
  fill: #fff;
}
.MdxControls__button--primary {
  background: #e50914;
}
.content-preview-watermark {
  position: absolute;
  left: 0;
  right: 0;
  margin: 0 auto;
  font-size: 4em;
  color: #fff;
  text-shadow: 0 2px #000;
  text-align: center;
  white-space: nowrap;
}
.content-preview-watermark.top-center {
  top: 60px;
}
.content-preview-watermark.bottom-center {
  bottom: 60px;
}
.nfa-dir-ltr {
  direction: ltr;
}
.nfa-ta-center {
  text-align: center;
}
.nfa-bgc-40-black {
  background-color: rgba(0, 0, 0, 0.4);
}
.nfa-bgc-red-med {
  background-color: #e50914;
}
.nfa-bgc-red-light {
  background-color: #f61c27;
}
.nfa-bgc-red-dark {
  background-color: #c30811;
}
.nfa-z-idx-1 {
  z-index: 1;
}
.nfa-pos-abs {
  position: absolute;
}
.nfa-pos-rel {
  position: relative;
}
.nfa-overflow-hidden {
  overflow: hidden;
}
.nfa-opacity-0 {
  opacity: 0;
}
.nfa-opacity-1 {
  opacity: 1;
}
.nfa-top-0 {
  top: 0;
}
.nfa-left-0 {
  left: 0;
}
.nfa-right-0 {
  right: 0;
}
.nfa-right-5-em {
  right: 5em;
}
.nfa-bot-0 {
  bottom: 0;
}
.nfa-bot-6-em {
  bottom: 6em;
}
.nfa-d-flex {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.nfa-d-inline-flex {
  display: -webkit-inline-box;
  display: -webkit-inline-flex;
  display: -moz-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
}
.nfa-w-60 {
  width: 60%;
}
.nfa-w-90 {
  width: 90%;
}
.nfa-w-100 {
  width: 100%;
}
.nfa-h-100 {
  height: 100%;
}
.nfa-h-12-em {
  height: 12em;
}
.nfa-min-h-5-rem {
  min-height: 5rem;
}
.nfa-flx-dir-col {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.nfa-as-end {
  -webkit-align-self: flex-end;
  -ms-flex-item-align: end;
  align-self: flex-end;
}
.nfa-ai-center {
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.nfa-ai-flex-end {
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
}
.nfa-ai-stretch {
  -webkit-box-align: stretch;
  -webkit-align-items: stretch;
  -moz-box-align: stretch;
  -ms-flex-align: stretch;
  align-items: stretch;
}
.nfa-ac-center {
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
}
.nfa-bs-bb {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.nfa-jc-center {
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.nfa-jc-flex-end {
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
}
.nfa-text-shadow-light {
  text-shadow: 0 1px 0 #000;
}
.nfa-fs-1-em {
  font-size: 1em;
}
.nfa-fs-1-2-em {
  font-size: 1.2em;
}
.nfa-fs-1-6-em {
  font-size: 1.6em;
}
.nfa-fs-2-em {
  font-size: 2em;
}
.nfa-fs-2-4-em {
  font-size: 2.4em;
}
.nfa-fs-2-8-em {
  font-size: 2.8em;
}
.nfa-fs-4-8-em {
  font-size: 4.8em;
}
.nfa-fs-16-px {
  font-size: 16px;
}
.nfa-fw-normal {
  font-weight: 400;
}
.nfa-fw-400 {
  font-weight: 400;
}
.nfa-c-gray-80 {
  color: #ccc;
}
.nfa-c-gray-e6 {
  color: #e6e6e6;
}
.nfa-c-white-faded {
  color: rgba(255, 255, 255, 0.65);
}
.nfa-m-0 {
  margin: 0;
}
.nfa-p-0 {
  padding: 0;
}
.nfa-pb-0 {
  padding-bottom: 0;
}
.nfa-pb-02-em {
  padding-bottom: 0.2em;
}
.nfa-pb-05-em {
  padding-bottom: 0.5em;
}
.nfa-pb-1-em {
  padding-bottom: 1em;
}
.nfa-pt-0 {
  padding-top: 0;
}
.nfa-pt-02-em {
  padding-top: 0.2em;
}
.nfa-pt-05-em {
  padding-top: 0.5em;
}
.nfa-pt-1-em {
  padding-top: 1em;
}
.nfa-pl-1-em {
  padding-left: 1em;
}
.nfa-pl-2-25-em {
  padding-left: 2.25em;
}
.nfa-pl-3-em {
  padding-left: 3em;
}
.nfa-pr-1-em {
  padding-right: 1em;
}
.nfa-pr-2-25-em {
  padding-right: 2.25em;
}
.nfa-pr-3-em {
  padding-right: 3em;
}
.nfa-bot-10 {
  bottom: 10%;
}
.nfa-right-10 {
  right: 10%;
}
.nfa-ls-0-25-em {
  letter-spacing: 0.25em;
}
.nfa-br-2-px {
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  border-radius: 2px;
}
.nfa-bos-solid {
  border-style: solid;
}
.nfa-bow-1-px {
  border-width: 1px;
}
.nfa-boc-transparent {
  border-color: transparent;
}
.nfa-cursor-pointer {
  cursor: pointer;
}
.nfa-us-none {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.nfa-lh-1 {
  line-height: 1;
}
.nfa-minw-10-5-em {
  min-width: 10.5em;
}
.evidence-overlay {
  padding: 12em;
  font-size: 1.5em;
}
.eo-transition-appear,
.eo-transition-enter {
  opacity: 0.01;
  -webkit-transform: scale(2.5);
  -moz-transform: scale(2.5);
  -ms-transform: scale(2.5);
  -o-transform: scale(2.5);
  transform: scale(2.5);
}
.eo-transition-appear.eo-transition-appear-active,
.eo-transition-appear.eo-transition-enter-active,
.eo-transition-enter.eo-transition-appear-active,
.eo-transition-enter.eo-transition-enter-active {
  -webkit-transition: opacity 0.1s ease-out, -webkit-transform 0.1s ease-out;
  transition: opacity 0.1s ease-out, -webkit-transform 0.1s ease-out;
  -o-transition: opacity 0.1s ease-out, -o-transform 0.1s ease-out;
  -moz-transition: transform 0.1s ease-out, opacity 0.1s ease-out,
    -moz-transform 0.1s ease-out;
  transition: transform 0.1s ease-out, opacity 0.1s ease-out;
  transition: transform 0.1s ease-out, opacity 0.1s ease-out,
    -webkit-transform 0.1s ease-out, -moz-transform 0.1s ease-out,
    -o-transform 0.1s ease-out;
  opacity: 1;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.eo-transition-leave {
  opacity: 1;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.eo-transition-leave.eo-transition-leave-active {
  opacity: 0.01;
  -webkit-transform: scale(2.5);
  -moz-transform: scale(2.5);
  -ms-transform: scale(2.5);
  -o-transform: scale(2.5);
  transform: scale(2.5);
  -webkit-transition: opacity 0.1s ease-out, -webkit-transform 0.1s ease-out;
  transition: opacity 0.1s ease-out, -webkit-transform 0.1s ease-out;
  -o-transition: opacity 0.1s ease-out, -o-transform 0.1s ease-out;
  -moz-transition: transform 0.1s ease-out, opacity 0.1s ease-out,
    -moz-transform 0.1s ease-out;
  transition: transform 0.1s ease-out, opacity 0.1s ease-out;
  transition: transform 0.1s ease-out, opacity 0.1s ease-out,
    -webkit-transform 0.1s ease-out, -moz-transform 0.1s ease-out,
    -o-transform 0.1s ease-out;
}
@-webkit-keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@-moz-keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@-o-keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
@-webkit-keyframes fadeOut {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}
@-moz-keyframes fadeOut {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}
@-o-keyframes fadeOut {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}
@keyframes fadeOut {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}
.ReportAProblem--popup {
  cursor: pointer;
  padding: 2em;
  direction: ltr;
}
.ReportAProblem--popup:hover {
  text-decoration: underline;
}
.ReportAProblem--popup-text {
  font-size: 2.2em;
  white-space: nowrap;
}
.ReportAProblem--button-icon {
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#cacaca),
    to(#6a6a6a)
  );
  background: -webkit-linear-gradient(#cacaca, #6a6a6a);
  background: -moz-linear-gradient(#cacaca, #6a6a6a);
  background: -o-linear-gradient(#cacaca, #6a6a6a);
  background: linear-gradient(#cacaca, #6a6a6a);
  -webkit-transition: -webkit-transform 0.1s linear;
  transition: -webkit-transform 0.1s linear;
  -o-transition: -o-transform 0.1s linear;
  -moz-transition: transform 0.1s linear, -moz-transform 0.1s linear;
  transition: transform 0.1s linear;
  transition: transform 0.1s linear, -webkit-transform 0.1s linear,
    -moz-transform 0.1s linear, -o-transform 0.1s linear;
  color: #262626;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-border-radius: 1.6em;
  -moz-border-radius: 1.6em;
  border-radius: 1.6em;
  width: 1.6em;
  height: 1.6em;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  font-size: 2.2em;
  font-weight: 700;
  margin: 0 auto;
}
.ReportAProblemPopupContainer {
  position: relative;
}
.ReportAProblemPopupContainer + .nfp-popup-control .nfp-button-control {
  border-left: 1px solid #323232; /*!rtl:ignore*/
}
.nfp .legacy-controls-styles .ReportAProblem--popup.popup-content:after {
  left: auto; /*!rtl:ignore*/
  margin-left: -1.5em; /*!rtl:ignore*/
  right: 1.9em; /*!rtl:ignore*/
}
.nfp .button-reportAProblem {
  border-right: 1px solid #151515; /*!rtl:ignore*/
  display: block;
}
.nfp .button-reportAProblem:hover .ReportAProblem--button-icon {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(#fff),
    to(#858585)
  );
  background: -webkit-linear-gradient(#fff, #858585);
  background: -moz-linear-gradient(#fff, #858585);
  background: -o-linear-gradient(#fff, #858585);
  background: linear-gradient(#fff, #858585);
}
.ReportAProblemDialog--container,
.ReportAProblemDialog--focus-trap {
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
}
.ReportAProblemDialog--container {
  background: rgba(0, 0, 0, 0.8);
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-animation: fadeIn 0.25s forwards;
  -moz-animation: fadeIn 0.25s forwards;
  -o-animation: fadeIn 0.25s forwards;
  animation: fadeIn 0.25s forwards;
}
.ReportAProblemDialog--container.ReportAProblemDialog--container-leaving {
  -webkit-animation: fadeOut 0.25s forwards;
  -moz-animation: fadeOut 0.25s forwards;
  -o-animation: fadeOut 0.25s forwards;
  animation: fadeOut 0.25s forwards;
}
.ReportAProblemDialog--dialog-box {
  width: 50rem;
  font-size: 1.4rem;
  background-color: #141414;
  border: 2px solid #404040;
  border-top: none;
  -webkit-box-shadow: 0 -4px #bf1315;
  -moz-box-shadow: 0 -4px #bf1315;
  box-shadow: 0 -4px #bf1315;
  color: #fff;
  position: relative;
  padding: 2rem;
  max-height: 100%;
  overflow-y: auto;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.ReportAProblemDialog--submit-button {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  color: #fff;
  background-color: #bf1315;
  border: 1px solid transparent;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  margin: 1.5rem 0 0 0;
  padding: 0.75rem;
}
.ReportAProblemDialog--submit-button:focus,
.ReportAProblemDialog--submit-button:hover {
  border-color: #fff;
}
.ReportAProblemDialog--form-container {
  overflow: hidden;
  min-height: 15rem;
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.ReportAProblemDialog--form-container.ReportAProblemDialog--request-complete {
  height: 15rem;
}
.ReportAProblemDialog--form-contents {
  overflow: hidden;
  max-height: 56rem;
  -webkit-transition: max-height 250ms ease-out, opacity 250ms ease-out;
  -o-transition: max-height 250ms ease-out, opacity 250ms ease-out;
  -moz-transition: max-height 250ms ease-out, opacity 250ms ease-out;
  transition: max-height 250ms ease-out, opacity 250ms ease-out;
}
.ReportAProblemDialog--form-contents.ReportAProblemDialog--request-sent {
  max-height: 0;
  opacity: 0;
}
.ReportAProblemDialog--completion-container {
  overflow: hidden;
  opacity: 0;
  max-height: 0;
  -webkit-transition: opacity 250ms ease-out;
  -o-transition: opacity 250ms ease-out;
  -moz-transition: opacity 250ms ease-out;
  transition: opacity 250ms ease-out;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
}
.ReportAProblemDialog--completion-container.ReportAProblemDialog--request-complete {
  opacity: 1;
  max-height: 50rem;
}
.ReportAProblemDialog--close-button {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border: 0;
  background: 0 0;
  position: absolute;
  top: 2rem;
  right: 2rem;
  cursor: pointer;
  padding: 0;
  margin: 0;
  z-index: 1;
  width: 2rem;
  height: 2rem;
}
.ReportAProblemDialog--close-button .svg-icon.svg-icon-nfplayerExit {
  fill: #666;
  height: 100%;
  width: 100%;
}
.ReportAProblemDialog--close-button:focus .svg-icon.svg-icon-nfplayerExit,
.ReportAProblemDialog--close-button:hover .svg-icon.svg-icon-nfplayerExit {
  fill: #fff;
}
.ReportAProblemDialog--header,
.ReportAProblemDialog--sub-header {
  margin: 0;
  padding: 0;
}
.ReportAProblemDialog--header {
  font-size: 2.2rem;
}
.ReportAProblemDialog--sub-header {
  font-size: 1.4rem;
  font-weight: 400;
  color: #b3b3b3;
  padding: 0.2rem 0;
}
.ReportAProblemDialog--form {
  margin: 2rem 0 0 0;
}
.ReportAProblemDialog--fieldset {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.ReportAProblemDialog--fieldset {
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin: 0 0 1rem;
}
.ReportAProblemDialog--fieldset:hover .ReportAProblemDialog--checkbox {
  border-color: #fff;
}
.ReportAProblemDialog--message-fieldset {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  max-height: 0;
  opacity: 0;
  -webkit-transition: max-height 250ms ease-out, opacity 250ms ease-out;
  -o-transition: max-height 250ms ease-out, opacity 250ms ease-out;
  -moz-transition: max-height 250ms ease-out, opacity 250ms ease-out;
  transition: max-height 250ms ease-out, opacity 250ms ease-out;
}
.ReportAProblemDialog--message-fieldset.ReportAProblemDialog--message-fieldset-visible {
  max-height: 20rem;
  opacity: 1;
}
.ReportAProblemDialog--label-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-flex: 1;
  -webkit-flex: 1 0;
  -moz-box-flex: 1;
  -ms-flex: 1 0;
  flex: 1 0;
}
.ReportAProblemDialog--checkbox-label {
  font-size: 1.6rem;
  font-weight: 700;
  cursor: pointer;
}
.ReportAProblemDialog--checkbox-label-definition {
  color: #b3b3b3;
  font-size: 1.2rem;
  display: block;
  font-weight: 400;
}
.ReportAProblemDialog--checkbox-container {
  width: 2rem;
  height: 2rem;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  position: relative;
  margin: 0 1rem 0 0;
}
.ReportAProblemDialog--checkbox-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  z-index: 1;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  cursor: pointer;
  outline: 0;
  opacity: 0;
}
.ReportAProblemDialog--checkbox-input:focus + .ReportAProblemDialog--checkbox {
  border-color: #fff;
}
.ReportAProblemDialog--checkbox-input:checked
  + .ReportAProblemDialog--checkbox:before {
  color: #bf1315;
  content: "✔";
}
.ReportAProblemDialog--checkbox {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  background: #000;
  border: 1px solid #979797;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  font-size: 1.6rem;
}
.ReportAProblemDialog--textarea {
  background-color: #000;
  color: #fff;
  resize: none;
  border: 1px solid #979797;
  width: 50%;
}
.ReportAProblemDialog--details-header {
  font-weight: 400;
  padding: 0;
  margin: 2rem 0 0.5rem 0;
}
.ReportAProblemDialog--details-question,
.ReportAProblemDialog--details-question-optional {
  display: inline-block;
}
.ReportAProblemDialog--details-question-optional {
  padding-left: 0.5rem;
  color: #b3b3b3;
}
.ReportAProblemDialog--confirmation-title {
  display: block;
  font-weight: 700;
  font-size: 1.8rem;
  margin: 0.25rem 0 1rem 0;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
}
.ReportAProblemDialog--confirmation-subtext {
  color: #b3b3b3;
  font-size: 1.2rem;
  display: block;
}
.ReportAProblemDialog--button-row {
  margin: 3rem 0 0 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.ReportAProblemDialog--finish-button {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  color: #fff;
  background-color: #bf1315;
  border: 1px solid transparent;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  padding: 0.75rem 2rem;
  margin: 0 3rem 0 0;
}
.ReportAProblemDialog--finish-button:focus,
.ReportAProblemDialog--finish-button:hover {
  border-color: #fff;
}
.ReportAProblemDialog--help-link {
  text-decoration: none;
  outline: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.ReportAProblemDialog--help-link:focus,
.ReportAProblemDialog--help-link:hover {
  text-decoration: underline;
}
.ReportAProblemDialog--chevron {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}
.ReportAProblemDialog--chevron:before {
  border-style: solid;
  border-width: 0.1em 0.1em 0 0;
  content: "";
  display: block;
  position: relative;
  height: 0.45em;
  width: 0.45em;
  left: 0;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  margin-left: 0.5rem;
}
.ReportAProblemDialog--error-message {
  color: #b3b3b3;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  margin: 1rem 0 0 0;
}
.SeamlessControls--container {
  opacity: 0;
  visibility: hidden;
  -webkit-transition-property: opacity, visibility;
  -o-transition-property: opacity, visibility;
  -moz-transition-property: opacity, visibility;
  transition-property: opacity, visibility;
  -webkit-transition-duration: 0.3s, 0s;
  -moz-transition-duration: 0.3s, 0s;
  -o-transition-duration: 0.3s, 0s;
  transition-duration: 0.3s, 0s;
  -webkit-transition-delay: 0s, 0.3s;
  -moz-transition-delay: 0s, 0.3s;
  -o-transition-delay: 0s, 0.3s;
  transition-delay: 0s, 0.3s;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.SeamlessControls--container-visible {
  opacity: 1;
  visibility: visible;
  -webkit-transition-delay: 0s, 0s;
  -moz-transition-delay: 0s, 0s;
  -o-transition-delay: 0s, 0s;
  transition-delay: 0s, 0s;
}
.SeamlessControls--container .nf-flat-button:focus {
  border-color: #fff;
}
.SeamlessControls--background-artwork {
  -moz-background-size: cover;
  background-size: cover;
  background-position: 50% 50%;
  -webkit-transition: 0.5s opacity ease-out;
  -o-transition: 0.5s opacity ease-out;
  -moz-transition: 0.5s opacity ease-out;
  transition: 0.5s opacity ease-out;
  position: absolute;
  opacity: 0;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
.SeamlessControls--background-artwork-visible {
  opacity: 1;
}
.PlayIcon {
  background-image: url(https://assets.nflxext.com/en_us/buttons/play-button-114.png);
  background-position: center bottom;
  background-repeat: no-repeat;
  -moz-background-size: contain;
  background-size: contain;
  display: block;
  height: 100%;
}
.PlayIcon-visibility-hidden {
  visibility: hidden;
}
.PlayIcon-transparent {
  opacity: 0;
}
.PlayIcon-semi-opaque {
  opacity: 0.15;
}
.PlayIcon-opaque {
  opacity: 1;
}
.PlayIcon-fade-on-hover {
  -webkit-transition: opacity 0.2s ease-out;
  -o-transition: opacity 0.2s ease-out;
  -moz-transition: opacity 0.2s ease-out;
  transition: opacity 0.2s ease-out;
}
.PlayIcon-fade-on-hover:hover {
  opacity: 1;
}
.PlayIcon-grow-on-hover {
  -webkit-transition: -webkit-transform 0.2s ease-out;
  transition: -webkit-transform 0.2s ease-out;
  -o-transition: -o-transform 0.2s ease-out;
  -moz-transition: transform 0.2s ease-out, -moz-transform 0.2s ease-out;
  transition: transform 0.2s ease-out;
  transition: transform 0.2s ease-out, -webkit-transform 0.2s ease-out,
    -moz-transform 0.2s ease-out, -o-transform 0.2s ease-out;
}
.PlayIcon-grow-on-hover:hover {
  -webkit-transform: scale(1.2);
  -moz-transform: scale(1.2);
  -ms-transform: scale(1.2);
  -o-transform: scale(1.2);
  transform: scale(1.2);
}
.PlayIcon-size-medium {
  width: 2.5em;
  height: 2.5em;
}
.PlayIcon-size-large {
  width: 3em;
  height: 3em;
}
.PlayIcon-centered {
  position: absolute;
  top: 50%;
  left: 50%;
}
.PlayIcon-centered.PlayIcon-size-medium {
  margin-top: -1.25em;
  margin-left: -1.25em;
}
.PlayIcon-centered.PlayIcon-size-large {
  margin-top: -1.5em;
  margin-left: -1.5em;
}
.sizing-wrapper .AkiraPlayer.container-large,
.sizing-wrapper .AkiraPlayer.container-small,
.sizing-wrapper .nfp.container-large,
.sizing-wrapper .nfp.container-small {
  font-size: inherit;
}
.nfp.nf-player-legacy-container.container-large,
.nfp.nf-player-legacy-container.container-small {
  font-size: inherit;
}
.nfp .svg-icon.svg-icon-bvuiFullScreenOff,
.nfp .svg-icon.svg-icon-bvuiFullScreenOn {
  width: 1.33333333em;
  height: 1.11111111em;
}
.nfp .legacy-controls-styles .controls-full-hit-zone,
.nfp .legacy-controls-styles .main-controls,
.nfp .legacy-controls-styles .top-left-controls {
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-transition: opacity 0.4s ease-out;
  -o-transition: opacity 0.4s ease-out;
  -moz-transition: opacity 0.4s ease-out;
  transition: opacity 0.4s ease-out;
}
.nfp .legacy-controls-styles.active .controls-full-hit-zone,
.nfp .legacy-controls-styles.active .main-controls {
  opacity: 1;
}
.nfp .legacy-controls-styles.dimmed .bottom-controls,
.nfp .legacy-controls-styles.dimmed .controls-full-hit-zone,
.nfp .legacy-controls-styles.dimmed .main-controls,
.nfp .legacy-controls-styles.dimmed .top-left-controls,
.nfp .legacy-controls-styles.inactive .bottom-controls,
.nfp .legacy-controls-styles.inactive .controls-full-hit-zone,
.nfp .legacy-controls-styles.inactive .main-controls,
.nfp .legacy-controls-styles.inactive .top-left-controls {
  opacity: 0;
}
.nfp .legacy-controls-styles.playback-timedout .controls-full-hit-zone,
.nfp .legacy-controls-styles.playback-timedout .main-controls,
.nfp .legacy-controls-styles.playback-timedout .top-left-controls {
  opacity: 1;
}
.nfp .legacy-controls-styles.playback-timedout .bottom-controls {
  opacity: 0;
}
.nfp .legacy-controls-styles.playback-timedout.dimmed:before {
  opacity: 0.25;
}
.nfp .legacy-controls-styles.PlayerControls--low-power {
  display: none;
}
.nfp
  .legacy-controls-styles
  .bottom-controls.nfp-control-row
  .popup-content-wrapper {
  padding: 0 0 2.5em 0;
  margin: 0 0 -1em 0;
}
.nfp .legacy-controls-styles .scrubber-container {
  padding: 0;
}
.nfp .legacy-controls-styles .scrubber-container .scrubber-bar {
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
.nfp .legacy-controls-styles .scrubber-container:hover .track {
  -webkit-transform: none;
  -moz-transform: none;
  -ms-transform: none;
  -o-transform: none;
  transform: none;
}
.nfp .legacy-controls-styles .scrubber-container .track {
  height: 100%;
  background: #262626;
  -webkit-box-shadow: 0 0.2em 0.1em 0 #000;
  -moz-box-shadow: 0 0.2em 0.1em 0 #000;
  box-shadow: 0 0.2em 0.1em 0 #000;
  overflow: hidden;
  -webkit-border-radius: 1em;
  -moz-border-radius: 1em;
  border-radius: 1em;
  -webkit-transition: none;
  -o-transition: none;
  -moz-transition: none;
  transition: none;
}
.nfp .legacy-controls-styles .scrubber-container .buffered {
  background: #2f3233;
  -webkit-border-radius: 1em;
  -moz-border-radius: 1em;
  border-radius: 1em;
}
.nfp .legacy-controls-styles .scrubber-container .current-progress {
  background: -webkit-radial-gradient(#bf1315, #9b0103);
  background: -moz-radial-gradient(#bf1315, #9b0103);
  background: -o-radial-gradient(#bf1315, #9b0103);
  background: radial-gradient(#bf1315, #9b0103);
  -webkit-border-radius: 1em;
  -moz-border-radius: 1em;
  border-radius: 1em;
}
.nfp .legacy-controls-styles .scrubber-container .scrubber-head {
  background: -webkit-radial-gradient(#b7090b 33%, #830607);
  background: -moz-radial-gradient(#b7090b 33%, #830607);
  background: -o-radial-gradient(#b7090b 33%, #830607);
  background: radial-gradient(#b7090b 33%, #830607);
  -webkit-box-shadow: #000 0 0 2px;
  -moz-box-shadow: #000 0 0 2px;
  box-shadow: #000 0 0 2px;
  -webkit-transition: -webkit-transform 0.1s ease-out;
  transition: -webkit-transform 0.1s ease-out;
  -o-transition: -o-transform 0.1s ease-out;
  -moz-transition: transform 0.1s ease-out, -moz-transform 0.1s ease-out;
  transition: transform 0.1s ease-out;
  transition: transform 0.1s ease-out, -webkit-transform 0.1s ease-out,
    -moz-transform 0.1s ease-out, -o-transform 0.1s ease-out;
  width: 2.24em;
  height: 2.24em;
  margin: -1.12em;
}
.nfp .legacy-controls-styles .scrubber-container .scrubber-head:hover {
  -webkit-transform: scale(1.2);
  -moz-transform: scale(1.2);
  -ms-transform: scale(1.2);
  -o-transform: scale(1.2);
  transform: scale(1.2);
}
.nfp .legacy-controls-styles .nf-big-play-pause {
  font-size: 2em;
}
.nfp .legacy-controls-styles .trickplay {
  bottom: 3em;
}
.nfp .legacy-controls-styles .trickplay.trickplay-text-and-image {
  background: #262626;
  -webkit-border-radius: 1em;
  -moz-border-radius: 1em;
  border-radius: 1em;
  -webkit-box-shadow: 1px 1px 1px #000;
  -moz-box-shadow: 1px 1px 1px #000;
  box-shadow: 1px 1px 1px #000;
}
.nfp .legacy-controls-styles .trickplay .tp-image {
  -webkit-border-top-left-radius: 1em;
  -moz-border-radius-topleft: 1em;
  border-top-left-radius: 1em;
  -webkit-border-top-right-radius: 1em;
  -moz-border-radius-topright: 1em;
  border-top-right-radius: 1em;
  overflow: hidden;
}
.nfp .legacy-controls-styles .trickplay .tp-text {
  font-size: 2em;
  position: relative;
}
.nfp .legacy-controls-styles .trickplay.trickplay-text-only {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}
.nfp .legacy-controls-styles .trickplay.trickplay-text-only .tp-text {
  background: #262626;
  -webkit-border-radius: 0.5em;
  -moz-border-radius: 0.5em;
  border-radius: 0.5em;
  -webkit-box-shadow: 1px 1px 1px #000;
  -moz-box-shadow: 1px 1px 1px #000;
  box-shadow: 1px 1px 1px #000;
}
.nfp .legacy-controls-styles .trickplay.trickplay-text-only:after {
  left: 0; /*!rtl:ignore*/
}
.nfp .legacy-controls-styles .trickplay:after {
  content: "";
  position: absolute;
  bottom: -1.4em;
  left: 50%; /*!rtl:ignore*/
  margin-left: -1.5em; /*!rtl:ignore*/
  border-left: 1.5em solid transparent;
  border-right: 1.5em solid transparent;
  border-top: 1.5em solid #262626;
}
.nfp .legacy-controls-styles .popup-content {
  background: #262626;
  position: relative;
  -webkit-border-radius: 0.65em;
  -moz-border-radius: 0.65em;
  border-radius: 0.65em;
  -webkit-box-shadow: 0 2px 1px 0 #000;
  -moz-box-shadow: 0 2px 1px 0 #000;
  box-shadow: 0 2px 1px 0 #000;
}
.nfp .legacy-controls-styles .popup-content:after {
  content: "";
  position: absolute;
  bottom: -1.4em;
  left: 50%; /*!rtl:ignore*/
  margin-left: -1.5em; /*!rtl:ignore*/
  border-left: 1.5em solid transparent;
  border-right: 1.5em solid transparent;
  border-top: 1.5em solid #262626;
}
.nfp .legacy-controls-styles .volume-controller {
  width: 100%;
}
.nfp .legacy-controls-styles .volume-controller .slider-bar-container {
  width: 1.6em;
  background: #333;
  -webkit-border-radius: 1.6em;
  -moz-border-radius: 1.6em;
  border-radius: 1.6em;
  -webkit-box-shadow: 0 0.1em 0.1em 0 #000;
  -moz-box-shadow: 0 0.1em 0.1em 0 #000;
  box-shadow: 0 0.1em 0.1em 0 #000;
  margin: 2.2em 2.85em;
  height: 12em;
}
.nfp
  .legacy-controls-styles
  .volume-controller
  .slider-bar-container
  .slider-bar-percentage {
  width: 1.6em;
  -webkit-border-radius: 1.6em;
  -moz-border-radius: 1.6em;
  border-radius: 1.6em;
}
.nfp .legacy-controls-styles .volume-controller .scrubber-head {
  background: -webkit-radial-gradient(#eee 33%, #9f9f9f);
  background: -moz-radial-gradient(#eee 33%, #9f9f9f);
  background: -o-radial-gradient(#eee 33%, #9f9f9f);
  background: radial-gradient(#eee 33%, #9f9f9f);
  -webkit-box-shadow: #000 0 0 2px;
  -moz-box-shadow: #000 0 0 2px;
  box-shadow: #000 0 0 2px;
  z-index: 1;
  width: 2.24em;
  height: 2.24em;
  margin: -1.12em;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: -webkit-transform 0.1s ease-out;
  transition: -webkit-transform 0.1s ease-out;
  -o-transition: -o-transform 0.1s ease-out;
  -moz-transition: transform 0.1s ease-out, -moz-transform 0.1s ease-out;
  transition: transform 0.1s ease-out;
  transition: transform 0.1s ease-out, -webkit-transform 0.1s ease-out,
    -moz-transform 0.1s ease-out, -o-transform 0.1s ease-out;
}
.nfp .legacy-controls-styles .volume-controller .scrubber-head:hover {
  -webkit-transform: scale(1.2);
  -moz-transform: scale(1.2);
  -ms-transform: scale(1.2);
  -o-transform: scale(1.2);
  transform: scale(1.2);
}
.nfp .legacy-controls-styles .volume-controller .slider-bar-percentage {
  width: 0.8em;
  -webkit-border-radius: 0.4em;
  -moz-border-radius: 0.4em;
  border-radius: 0.4em;
  background: -webkit-radial-gradient(#fff, #9f9f9f);
  background: -moz-radial-gradient(#fff, #9f9f9f);
  background: -o-radial-gradient(#fff, #9f9f9f);
  background: radial-gradient(#fff, #9f9f9f);
}
.nfp .legacy-controls-styles .next-episode {
  width: 49.222222em;
}
.nfp .legacy-controls-styles .next-episode .PlayIcon {
  opacity: 0;
  -webkit-transform: scale(0.6);
  -moz-transform: scale(0.6);
  -ms-transform: scale(0.6);
  -o-transform: scale(0.6);
  transform: scale(0.6);
  -webkit-transition: opacity 0.2s ease-out, -webkit-transform 0.1s ease-out;
  transition: opacity 0.2s ease-out, -webkit-transform 0.1s ease-out;
  -o-transition: opacity 0.2s ease-out, -o-transform 0.1s ease-out;
  -moz-transition: opacity 0.2s ease-out, transform 0.1s ease-out,
    -moz-transform 0.1s ease-out;
  transition: opacity 0.2s ease-out, transform 0.1s ease-out;
  transition: opacity 0.2s ease-out, transform 0.1s ease-out,
    -webkit-transform 0.1s ease-out, -moz-transform 0.1s ease-out,
    -o-transform 0.1s ease-out;
}
.nfp .legacy-controls-styles .next-episode:hover .PlayIcon {
  opacity: 1;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.nfp .legacy-controls-styles .next-episode:after {
  right: 0; /*!rtl:ignore*/
  left: auto; /*!rtl:ignore*/
  margin-right: 8.3em; /*!rtl:ignore*/
}
.nfp .legacy-controls-styles .next-episode .header {
  padding: 0.5em 1em 0.5em 1em;
}
.nfp .legacy-controls-styles .next-episode .header,
.nfp .legacy-controls-styles .next-episode .nfp-episode-preview {
  font-size: 2em;
}
.nfp .legacy-controls-styles .next-episode .nfp-episode-preview {
  -webkit-border-bottom-left-radius: 1em;
  -moz-border-radius-bottomleft: 1em;
  border-bottom-left-radius: 1em;
  -webkit-border-bottom-right-radius: 1em;
  -moz-border-radius-bottomright: 1em;
  border-bottom-right-radius: 1em;
  padding-top: 0;
}
.nfp .legacy-controls-styles .next-episode .nfp-episode-preview .thumbnail {
  margin: -1.5em 1em 0 1em;
}
.nfp .legacy-controls-styles .next-episode .nfp-episode-preview .number,
.nfp .legacy-controls-styles .next-episode .nfp-episode-preview .title {
  font-weight: 700;
}
.nfp
  .legacy-controls-styles
  .next-episode
  .nfp-episode-preview
  .expand-preview-arrow {
  display: none;
}
.nfp .legacy-controls-styles .next-episode .title-container {
  padding-left: 10.25em;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.nfp .legacy-controls-styles .nfp-episode-preview.expanded {
  background: #262626;
}
.nfp
  .legacy-controls-styles
  .nfp-episode-preview.expanded
  .thumbnail
  .nf-big-play-pause {
  font-size: 1em;
}
.nfp .legacy-controls-styles .nfp-episode-selector .of-hidden {
  font-size: 2em;
  width: 22.555556em;
  height: 28.944444em;
  -webkit-border-radius: 0.45em;
  -moz-border-radius: 0.45em;
  border-radius: 0.45em;
  overflow: hidden;
  position: relative;
}
.nfp .legacy-controls-styles .nfp-episode-selector .of-hidden .episode-list,
.nfp .legacy-controls-styles .nfp-episode-selector .of-hidden .season-list {
  width: 22.555556em;
  height: 28.944444em;
}
.nfp .legacy-controls-styles .nfp-episode-selector .pane {
  position: absolute;
  opacity: 1;
}
.nfp .legacy-controls-styles .nfp-episode-selector .pane.active {
  -webkit-transform: translateX(0);
  -moz-transform: translateX(0);
  -ms-transform: translateX(0);
  -o-transform: translateX(0);
  transform: translateX(0);
}
.nfp .legacy-controls-styles .nfp-episode-selector .seasons-pane {
  -webkit-transform: translateX(-100%);
  -moz-transform: translateX(-100%);
  -ms-transform: translateX(-100%);
  -o-transform: translateX(-100%);
  transform: translateX(-100%);
}
.nfp .legacy-controls-styles .nfp-episode-selector:after {
  right: 0; /*!rtl:ignore*/
  left: auto; /*!rtl:ignore*/
  margin-right: 8em; /*!rtl:ignore*/
}
.nfp .legacy-controls-styles .audio-subtitle-controller:after {
  right: 0; /*!rtl:ignore*/
  left: auto; /*!rtl:ignore*/
  margin-right: 8.1em; /*!rtl:ignore*/
}
.nfp .legacy-controls-styles.controls .PlayerControls--control-element-hidden {
  -webkit-transform: none;
  -moz-transform: none;
  -ms-transform: none;
  -o-transform: none;
  transform: none;
  -webkit-transition: none;
  -o-transition: none;
  -moz-transition: none;
  transition: none;
}
.nfp .legacy-controls-styles.controls .PlayerControls--control-element-blurred {
  opacity: 1;
}
.nfp
  .legacy-controls-styles.controls
  .PlayerControls--button-control-row:hover
  .PlayerControls--control-element-blurred {
  opacity: 1;
}
.nfp .legacy-controls-styles .audio-subtitle-controller .track-list {
  padding: 0.5em 0 1em 0;
}
.nfp
  .legacy-controls-styles
  .audio-subtitle-controller
  .track-list.track-list-audio {
  border-right: 1px solid #000; /*!rtl:ignore*/
}
.nfp
  .legacy-controls-styles
  .audio-subtitle-controller
  .track-list.track-list-subtitles {
  border-left: 1px solid #3b3b3b; /*!rtl:ignore*/
}
.nfp
  .legacy-controls-styles
  .audio-subtitle-controller
  .track-list
  .list-header {
  font-size: 2.1em;
}
.nfp .legacy-controls-styles .audio-subtitle-controller .track-list .track {
  direction: ltr;
  padding: 0.6em 3.4em 0.6em 3em;
  font-size: 1.8em;
  font-weight: 400;
}
.nfp
  .legacy-controls-styles
  .audio-subtitle-controller
  .track-list
  .track.selected {
  background: #171717;
}
.nfp .legacy-controls-styles .nfp-autoplay-interrupter .interrupter-actions {
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  font-size: 2.5em;
  padding: 0.25em;
  background: rgba(0, 0, 0, 0.85);
  -webkit-box-shadow: 0 0 1em 0 rgba(0, 0, 0, 0.8);
  -moz-box-shadow: 0 0 1em 0 rgba(0, 0, 0, 0.8);
  box-shadow: 0 0 1em 0 rgba(0, 0, 0, 0.8);
}
.nfp
  .legacy-controls-styles
  .nfp-autoplay-interrupter
  .interrupter-actions
  .nf-flat-button {
  margin: 0.5em;
  font-size: 1em;
}
.nfp .legacy-controls-styles .nfp-season-preview {
  border-top: 1px solid #333;
  border-bottom: 1px solid #000;
  padding: 0.15em 0;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  direction: ltr;
}
.nfp .legacy-controls-styles .nfp-season-preview.nfp-season-preview-is-active {
  background: #323232;
}
.nfp .legacy-controls-styles .nfp-season-preview .arrow {
  visibility: visible;
}
.nfp .legacy-controls-styles .nfp-season-preview .svg-icon-nfplayerBack {
  height: 2em;
  width: 1em;
}
.nfp .legacy-controls-styles .nfp-season-preview .title {
  font-size: 1.1em;
  padding: 0 0 0 1em;
}
.nfp .legacy-controls-styles .episode-list .header {
  height: 3.2em;
  border-bottom: 1px solid #000;
  -webkit-border-top-left-radius: 0.3em;
  -moz-border-radius-topleft: 0.3em;
  border-top-left-radius: 0.3em;
  -webkit-border-top-right-radius: 0.3em;
  -moz-border-radius-topright: 0.3em;
  border-top-right-radius: 0.3em;
  direction: ltr;
}
.nfp
  .legacy-controls-styles
  .episode-list
  .header:hover
  .svg-icon-nfplayerBack {
  -webkit-transform: rotate(0) scale(1.5); /*!rtl: rotate(180deg) scale(1.5)*/
  -moz-transform: rotate(0) scale(1.5); /*!rtl: rotate(180deg) scale(1.5)*/
  -ms-transform: rotate(0) scale(1.5); /*!rtl: rotate(180deg) scale(1.5)*/
  -o-transform: rotate(0) scale(1.5); /*!rtl: rotate(180deg) scale(1.5)*/
  transform: rotate(0) scale(1.5); /*!rtl: rotate(180deg) scale(1.5)*/
}
.nfp .legacy-controls-styles .episode-list .back {
  -webkit-transform: none;
  -moz-transform: none;
  -ms-transform: none;
  -o-transform: none;
  transform: none;
  height: 100%;
  border-right: 1px solid #333;
}
.nfp .legacy-controls-styles .episode-list .back .svg-icon-nfplayerBack {
  -webkit-transition: -webkit-transform 0.2s ease-out;
  transition: -webkit-transform 0.2s ease-out;
  -o-transition: -o-transform 0.2s ease-out;
  -moz-transition: transform 0.2s ease-out, -moz-transform 0.2s ease-out;
  transition: transform 0.2s ease-out;
  transition: transform 0.2s ease-out, -webkit-transform 0.2s ease-out,
    -moz-transform 0.2s ease-out, -o-transform 0.2s ease-out;
  -webkit-transform: rotate(0) scale(1.3); /*!rtl: rotate(180deg) scale(1.3)*/
  -moz-transform: rotate(0) scale(1.3); /*!rtl: rotate(180deg) scale(1.3)*/
  -ms-transform: rotate(0) scale(1.3); /*!rtl: rotate(180deg) scale(1.3)*/
  -o-transform: rotate(0) scale(1.3); /*!rtl: rotate(180deg) scale(1.3)*/
  transform: rotate(0) scale(1.3); /*!rtl: rotate(180deg) scale(1.3)*/
}
.nfp
  .legacy-controls-styles
  .episode-list
  .disable-back
  .header-title-container {
  border-left: 0;
}
.nfp .legacy-controls-styles .episode-list .header-title-container {
  border-left: 1px solid #000;
  height: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  padding: 0 0.8em;
}
.nfp .legacy-controls-styles .episode-list .header-title {
  font-size: 1.1em;
  font-weight: 700;
}
.nfp .legacy-controls-styles .episode-list .episode-row {
  border-top: 1px solid #333;
  border-bottom: 1px solid #000;
}
.nfp .legacy-controls-styles .episode-list .episode-row:not(.collapsed) {
  border-top-color: #000;
}
.nfp .legacy-controls-styles .episode-list .nfp-episode-preview.expanded {
  background: #111;
}
.nfp
  .legacy-controls-styles
  .episode-list
  .nfp-episode-preview.expanded:hover
  .PlayIcon {
  opacity: 1;
}
.nfp .legacy-controls-styles .episode-list .nfp-episode-preview .PlayIcon {
  -webkit-transition: opacity 0.2s ease-out;
  -o-transition: opacity 0.2s ease-out;
  -moz-transition: opacity 0.2s ease-out;
  transition: opacity 0.2s ease-out;
}
.nfp .legacy-controls-styles .nfp-episode-preview .title-and-synopsis {
  width: 100%;
  overflow: hidden;
}
.nfp .legacy-controls-styles .nfp-episode-preview .title {
  font-size: 0.9em;
  font-weight: 400;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  width: 100%;
}
.nfp .legacy-controls-styles .nfp-episode-preview .number {
  font-size: 0.9em;
  font-weight: 400;
}
.nfp .legacy-controls-styles .nfp-episode-preview .svg-icon-nfplayerBack {
  visibility: hidden;
  -webkit-transform: rotate(-90deg); /*!rtl:ignore*/
  -moz-transform: rotate(-90deg); /*!rtl:ignore*/
  -ms-transform: rotate(-90deg); /*!rtl:ignore*/
  -o-transform: rotate(-90deg); /*!rtl:ignore*/
  transform: rotate(-90deg); /*!rtl:ignore*/
  fill: #fff;
  padding: 0 1em;
}
.nfp .legacy-controls-styles .nfp-episode-preview .synopsis {
  margin: 0 0.3em 0 0;
  font-size: 0.8em;
}
.nfp
  .legacy-controls-styles
  .nfp-episode-preview:hover.collapsed
  .svg-icon-nfplayerBack {
  visibility: visible;
}
.nfp .legacy-controls-styles .nfp-episode-preview .thumbnail {
  margin: 0 1em;
}
.nfp .legacy-controls-styles .nfp-episode-preview .thumbnail-inner {
  position: relative;
}
.nfp .legacy-controls-styles .recap-lower {
  bottom: 10.1em;
  right: 10%;
  font-size: 1.8em;
}
.nfp .is-scrubbing .legacy-controls-styles .scrubber-container .track {
  -webkit-transform: none;
  -moz-transform: none;
  -ms-transform: none;
  -o-transform: none;
  transform: none;
}
.nfp .is-scrubbing .legacy-controls-styles .scrubber-container .scrubber-head {
  -webkit-transform: scale(1.6);
  -moz-transform: scale(1.6);
  -ms-transform: scale(1.6);
  -o-transform: scale(1.6);
  transform: scale(1.6);
}
.ellipsize-text {
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
  line-height: normal;
}
.nfp-button-control.circle-control-button.button-bvuiExit {
  height: auto;
  width: auto;
  margin: 2.3em;
}
.nfp-button-control.circle-control-button.button-bvuiExit:before {
  content: "";
  font-size: 2em;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
  position: absolute;
  border-top: 1em solid transparent;
  border-bottom: 1em solid transparent;
  border-right: 1em solid #262626;
  background: 0 0;
  z-index: 1;
  width: 0;
  height: 0;
  opacity: 0;
  margin-left: 3.5em;
}
.nfp-button-control.circle-control-button.button-bvuiExit:hover:before {
  opacity: 1;
  margin-left: 2.5em;
}
.nfp-button-control.circle-control-button.button-bvuiExit:after {
  background: #262626;
  -webkit-border-radius: 0.5em;
  -moz-border-radius: 0.5em;
  border-radius: 0.5em;
  -webkit-box-shadow: 1px 1px 1px #000;
  -moz-box-shadow: 1px 1px 1px #000;
  box-shadow: 1px 1px 1px #000;
  font-weight: 700;
  padding: 0.8em 1em;
  text-shadow: 1px 1px 1px #000;
  margin-left: 1.7em;
  font-size: 2em;
  top: 50%;
  margin-top: -1.4em;
}
.nfp-button-control.circle-control-button.button-bvuiExit:hover:after {
  margin-left: 0.35em;
}
.nfp-button-control.circle-control-button.button-bvuiExit .svg-icon-bvuiExit {
  width: 6.6em;
  height: 6.6em;
  padding: 0.5em;
  fill: #dadada;
  -webkit-transition: fill 150ms ease-in;
  -o-transition: fill 150ms ease-in;
  -moz-transition: fill 150ms ease-in;
  transition: fill 150ms ease-in;
  -webkit-transform: rotate(0);
  -moz-transform: rotate(0);
  -ms-transform: rotate(0);
  -o-transform: rotate(0);
  transform: rotate(0);
}
.nfp-button-control.circle-control-button.button-bvuiExit:hover
  .svg-icon-bvuiExit {
  fill: #fff;
}
.nfp .controls.legacy-controls-styles .skip-credits {
  z-index: 1;
  right: 10%;
  bottom: 17.5em;
}
.AkiraPlayer.classic-ui .player-loading {
  font-size: 2em;
}
.AkiraPlayer.classic-ui .player-loading .button-nfplayerExit {
  opacity: 0.5;
  -webkit-transition: opacity 0.2s ease-out;
  -o-transition: opacity 0.2s ease-out;
  -moz-transition: opacity 0.2s ease-out;
  transition: opacity 0.2s ease-out;
  padding: 0;
  width: 1.8em;
  height: 1.8em;
}
.AkiraPlayer.classic-ui .player-loading .button-nfplayerExit:before {
  background: 0 0;
  width: auto;
  height: auto;
  content: none;
}
.AkiraPlayer.classic-ui .player-loading .button-nfplayerExit:hover {
  opacity: 1;
}
.AkiraPlayer.classic-ui .player-loading .svg-icon-nfplayerExit {
  font-size: 1.5em;
}
.AkiraPlayer.classic-ui .player-loading .nfp-control-row.top-right-controls {
  margin: 3em;
  -webkit-align-self: flex-start;
  -ms-flex-item-align: start;
  align-self: flex-start;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
}
.AkiraPlayer.classic-ui .player-loading .nfp-control-row.top-left-controls {
  margin: 2.8em 2.3em;
}
.AkiraPlayer.classic-ui .player-loading .player-title-evidence {
  padding: 0.3em 0 0 0;
}
.AkiraPlayer.classic-ui .player-loading .player-title-evidence .playable-title {
  font-size: 1.3em;
  font-weight: 700;
}
.AkiraPlayer.classic-ui .player-loading .AkiraPlayerSpinner--container {
  font-size: 0.5em;
}
.classic-ui .nfp-fatal-error-view {
  font-size: inherit;
}
.classic-ui .nfp-fatal-error-view .button-bvuiExit {
  position: absolute;
  top: 0;
  left: 0;
}
.classic-ui .nfp-fatal-error-view .information {
  font-size: 2em;
}
.classic-ui .advisory-content {
  font-size: 1.8em;
}
.PlayerControls--bottom-controls {
  width: 100%;
  margin: 0;
  position: absolute;
  z-index: 2;
  bottom: 0;
  opacity: 1;
  -webkit-box-flex: 0;
  -webkit-flex: 0 1 auto;
  -moz-box-flex: 0;
  -ms-flex: 0 1 auto;
  flex: 0 1 auto;
  visibility: visible;
  -webkit-transition-property: opacity, visibility;
  -o-transition-property: opacity, visibility;
  -moz-transition-property: opacity, visibility;
  transition-property: opacity, visibility;
  -webkit-transition-duration: 0.4s, 0s;
  -moz-transition-duration: 0.4s, 0s;
  -o-transition-duration: 0.4s, 0s;
  transition-duration: 0.4s, 0s;
  -webkit-transition-delay: 0s, 0s;
  -moz-transition-delay: 0s, 0s;
  -o-transition-delay: 0s, 0s;
  transition-delay: 0s, 0s;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  direction: ltr; /*!rtl:ignore*/
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
}
.PlayerControls--bottom-controls:hover .PlayerControls--progress-control-row {
  opacity: 1;
}
.PlayerControls--bottom-controls:hover
  .PlayerControls--progress-control-row.show,
.PlayerControls--bottom-controls:hover
  .PlayerControls--progress-control-row:hover {
  -webkit-transform: none;
  -moz-transform: none;
  -ms-transform: none;
  -o-transform: none;
  transform: none;
}
.PlayerControls--bottom-controls-faded {
  opacity: 0;
  visibility: hidden;
  -webkit-transition-delay: 0s, 0.4s;
  -moz-transition-delay: 0s, 0.4s;
  -o-transition-delay: 0s, 0.4s;
  transition-delay: 0s, 0.4s;
}
.PlayerControls--progress-control-row-standard {
  -webkit-transition: -webkit-transform 0.1s linear;
  transition: -webkit-transform 0.1s linear;
  -o-transition: -o-transform 0.1s linear;
  -moz-transition: transform 0.1s linear, -moz-transform 0.1s linear;
  transition: transform 0.1s linear;
  transition: transform 0.1s linear, -webkit-transform 0.1s linear,
    -moz-transform 0.1s linear, -o-transform 0.1s linear;
  padding: 1.6em 0;
  height: 1.6em;
  width: 80%;
  margin: 0 10% 0 10%;
}
.PlayerControls--progress-control-row-standard.PlayerControls--progress-control-row-hidden {
  -webkit-transform: translateY(5em) scale(0.95);
  -moz-transform: translateY(5em) scale(0.95);
  -ms-transform: translateY(5em) scale(0.95);
  -o-transform: translateY(5em) scale(0.95);
  transform: translateY(5em) scale(0.95);
}
.PlayerControls--progress-control-row-standard.PlayerControls--progress-control-row-hidden
  .trickplay {
  display: none;
}
.PlayerControls--progress-control-row-standard .progress-control {
  min-height: auto;
}
.PlayerControls--progress-control-row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.PlayerControls--button-control-row {
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background: #262626;
  -webkit-border-radius: 1em;
  -moz-border-radius: 1em;
  border-radius: 1em;
  -webkit-box-shadow: 0 0.2em 0.1em 0 #000;
  -moz-box-shadow: 0 0.2em 0.1em 0 #000;
  box-shadow: 0 0.2em 0.1em 0 #000;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  height: 7em;
  text-align: left;
  width: 100%;
  width: 80%;
  margin: 0 10% 6em 10%;
  z-index: 1;
}
.PlayerControls--button-control-row .PlayerControls--control-element,
.PlayerControls--button-control-row .text-control {
  height: 100%;
}
.PlayerControls--button-control-row .nfp-button-control .svg-icon {
  -webkit-transition: -webkit-transform 0.1s linear;
  transition: -webkit-transform 0.1s linear;
  -o-transition: -o-transform 0.1s linear;
  -moz-transition: transform 0.1s linear, -moz-transform 0.1s linear;
  transition: transform 0.1s linear;
  transition: transform 0.1s linear, -webkit-transform 0.1s linear,
    -moz-transform 0.1s linear, -o-transform 0.1s linear;
}
.PlayerControls--button-control-row .nfp-button-control:hover .svg-icon {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
}
.PlayerControls--button-control-row .video-title.text-control {
  overflow: hidden;
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -moz-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  padding: 0 0.8em;
  border-left: 1px solid #323232; /*!rtl:ignore*/
  border-right: 0;
}
.PlayerControls--button-control-row .video-title.text-control .ellipsize-text {
  width: 100%;
  direction: ltr;
}
.PlayerControls--button-control-row .video-title.text-control h4,
.PlayerControls--button-control-row .video-title.text-control span {
  font-weight: 400;
  display: inline-block;
}
.PlayerControls--button-control-row .video-title.text-control h4 {
  font-size: 2.2em;
  padding: 0 0.7em;
  margin: 0;
  white-space: nowrap;
}
.PlayerControls--button-control-row .video-title.text-control span {
  font-size: 1.8em;
  padding-right: 0.5em;
  color: #adadad;
}
.PlayerControls--button-control-row .video-title.text-control.show-last-border {
  border-right: 1px solid #151515; /*!rtl:ignore*/
}
.PlayerControls--button-control-row
  .video-title.text-control.show-last-border
  + .nfp-popup-control
  .nfp-button-control {
  border-left: 1px solid #323232; /*!rtl:ignore*/
}
.PlayerControls--button-control-row .default-control-button {
  height: 100%;
  width: 6.5em;
  padding: 0;
}
.PlayerControls--button-control-row .default-control-button .svg-icon {
  font-size: 2.6em;
  width: 100%;
}
.PlayerControls--button-control-row .default-control-button .svg-icon use {
  fill: url(#legacyPlayerControlGradientDark);
}
.PlayerControls--button-control-row
  .default-control-button:hover
  .svg-icon
  use {
  fill: url(#legacyPlayerControlGradientLight);
}
.PlayerControls--button-control-row .button-nfplayerPause,
.PlayerControls--button-control-row .button-nfplayerPlay {
  border-right: 1px solid #151515; /*!rtl:ignore*/
}
.PlayerControls--button-control-row .button-volumeLow,
.PlayerControls--button-control-row .button-volumeMax,
.PlayerControls--button-control-row .button-volumeMedium,
.PlayerControls--button-control-row .button-volumeMuted {
  border-left: 1px solid #323232; /*!rtl:ignore*/
  border-right: 1px solid #151515; /*!rtl:ignore*/
}
.PlayerControls--button-control-row
  .button-nfplayerNextEpisode
  + .popup-content-wrapper {
  right: -6.5em; /*!rtl:ignore*/
}
.PlayerControls--button-control-row
  .button-nfplayerEpisodes
  + .popup-content-wrapper {
  right: -6.5em; /*!rtl:ignore*/
}
.PlayerControls--button-control-row
  .button-nfplayerSubtitles
  + .popup-content-wrapper {
  right: -6.5em; /*!rtl:ignore*/
}
.recap-lower {
  position: absolute;
  bottom: 4.11111111em;
  right: 1.44444444em;
  opacity: 0;
  -webkit-transition: opacity 0.5s ease;
  -o-transition: opacity 0.5s ease;
  -moz-transition: opacity 0.5s ease;
  transition: opacity 0.5s ease;
}
.recap-lower .nf-flat-button {
  margin: 0;
  font-size: 1em;
}
.cell2-layout .recap-lower {
  bottom: 6.44444444em;
}
#playerWrapper.preRoll .playback-longpause-container,
#playerWrapper.preRoll .player-status-main-title,
#playerWrapper.preRoll .skip-credits-container-node {
  display: none;
}
#playerWrapper.preRoll .player-back-to-browsing,
#playerWrapper.preRoll .player-controls-wrapper,
#playerWrapper.preRoll .report-problem-popup-bg {
  z-index: 7;
}
.fullSize {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}
.main-hitzone-element-container .preRoll {
  z-index: auto;
}
.preRoll {
  z-index: 6;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.preRollContainer {
  position: relative;
  width: 100vw;
  height: 56.25vw;
  -webkit-transform: translateZ(0);
  -moz-transform: translateZ(0);
  transform: translateZ(0);
}
@media screen and (min-aspect-ratio: 16/9) {
  .preRollContainer {
    width: 178vh;
    height: 100vh;
  }
}
.preRollIntro {
  position: absolute;
  top: 11.9%;
  bottom: 11.9%;
  left: 0;
  right: 0;
  z-index: 7;
  background: #2a2626;
  -webkit-animation: fadeOut;
  -moz-animation: fadeOut;
  -o-animation: fadeOut;
  animation: fadeOut;
  -webkit-animation-delay: 3.5s;
  -moz-animation-delay: 3.5s;
  -o-animation-delay: 3.5s;
  animation-delay: 3.5s;
  -webkit-animation-duration: 0.5s;
  -moz-animation-duration: 0.5s;
  -o-animation-duration: 0.5s;
  animation-duration: 0.5s;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
@-webkit-keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
@-moz-keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
@-o-keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
@keyframes fadeOut {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
.preRollIntroText {
  color: #fff;
  margin: 0 25% 0 25%;
  font-size: 1.9vw;
  line-height: 2em;
  text-shadow: 2px 0 0 #1b1818;
  text-align: center;
}
.preRollIntroText b {
  font-size: 1.2em;
}
.preRollNetflixLogo {
  position: absolute;
  bottom: 5vw;
  right: 4vw;
  font-size: 3.2vw;
  color: #e50914;
}
.preRollBlackCover {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: -1;
  background: #000;
}
.preRollBlackCover.fadeOut {
  -webkit-animation: fadeOut;
  -moz-animation: fadeOut;
  -o-animation: fadeOut;
  animation: fadeOut;
  -webkit-animation-duration: 0.5s;
  -moz-animation-duration: 0.5s;
  -o-animation-duration: 0.5s;
  animation-duration: 0.5s;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.preRollChrome {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: -webkit-radial-gradient(
    50% 30% at 14% 100%,
    rgba(0, 0, 0, 0.8) 0,
    rgba(0, 0, 0, 0) 100%
  );
  background: -moz-radial-gradient(
    50% 30% at 14% 100%,
    rgba(0, 0, 0, 0.8) 0,
    rgba(0, 0, 0, 0) 100%
  );
  background: -o-radial-gradient(
    50% 30% at 14% 100%,
    rgba(0, 0, 0, 0.8) 0,
    rgba(0, 0, 0, 0) 100%
  );
  background: radial-gradient(
    50% 30% at 14% 100%,
    rgba(0, 0, 0, 0.8) 0,
    rgba(0, 0, 0, 0) 100%
  );
}
.preRollMetaData {
  position: absolute;
  bottom: 2vw;
  left: 5%;
}
.preRollTrailerTitleLogo {
  width: 35vw;
  height: 6.57vw;
  -moz-background-size: contain;
  background-size: contain;
  background-repeat: no-repeat;
  margin-bottom: 1.5vw;
}
.preRollTrailerTitle {
  font-size: 2.73vw;
  margin-bottom: 1.5vw;
  max-height: 11.19vw;
  width: 37.5vw;
  overflow: hidden;
  line-height: 3.73vw;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  -moz-box-orient: vertical;
  -ms-box-orient: vertical;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  display: -webkit-box;
}
.preRollTagLineWrap {
  position: relative;
  margin-left: 0.6em;
  margin-bottom: 1.5vw;
}
.preRollTagLineWrap .preRollTagLine {
  position: relative;
  left: -0.5vw;
  top: -0.3vw;
  font-size: 1.9vw;
  line-height: 2.2vw;
  padding: 0 0 0 1.4vw;
}
.preRollTagLineWrap .redBlock {
  -webkit-transform-origin: 0 0;
  -moz-transform-origin: 0 0;
  -ms-transform-origin: 0 0;
  -o-transform-origin: 0 0;
  transform-origin: 0 0;
  width: 0.1vw;
  height: 1.9vw;
  content: " ";
  position: absolute;
  left: -0.6em;
  background: red;
  display: block;
}
.preRollSkipButton {
  position: absolute;
  bottom: 2vw;
  right: 5%;
  cursor: pointer;
  -moz-background-size: cover;
  background-size: cover;
  background-repeat: no-repeat;
  width: 18.76vw;
  height: 10.55vw;
  border: 0.2vw solid transparent;
}
.preRollSkipButton:focus,
.preRollSkipButton:hover {
  border-color: #fff;
}
.preRollSkipButton .preRollSkipButtonLabel {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  position: absolute;
  bottom: -1px;
  left: -1px;
  right: -1px;
  padding: 2.7vw 1vw 1vw 1vw;
  background: -webkit-gradient(
    linear,
    left top,
    left bottom,
    from(rgba(0, 0, 0, 0)),
    to(#000)
  );
  background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0, #000 100%);
  background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0, #000 100%);
  background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 0, #000 100%);
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0, #000 100%);
}
.preRollSkipButton .preRollSkipButtonLabel .text {
  font-size: 1.4vw;
  line-height: 1.8vw;
  margin-left: 0.8vw;
}
.preRollNowPlaying {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: -1;
  background-repeat: no-repeat;
  -moz-background-size: cover;
  background-size: cover;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  opacity: 0;
}
.preRollNowPlaying .preRollMetaDataWrapper {
  width: 100%;
  padding: 0 35% 0 5%;
}
.preRollNowPlaying .preRollMetaDataWrapper .preRollTitle {
  opacity: 0;
  font-size: 5.5vw;
  margin-bottom: 1vw;
  text-shadow: 2px 0 0.1vw #333;
  max-height: 19.5vw;
  overflow: hidden;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  -moz-box-orient: vertical;
  -ms-box-orient: vertical;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  display: -webkit-box;
  line-height: 6.5vw;
}
.preRollNowPlaying .preRollMetaDataWrapper .preRollLabel {
  opacity: 0;
  font-size: 3.5vw;
  text-shadow: 2px 0 0.1vw #333;
}
@-webkit-keyframes scaleDownFadeIn {
  0% {
    opacity: 0;
    -webkit-transform: scale(1, 0);
    transform: scale(1, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1, 1);
    transform: scale(1, 1);
  }
}
@-moz-keyframes scaleDownFadeIn {
  0% {
    opacity: 0;
    -moz-transform: scale(1, 0);
    transform: scale(1, 0);
  }
  100% {
    opacity: 1;
    -moz-transform: scale(1, 1);
    transform: scale(1, 1);
  }
}
@-o-keyframes scaleDownFadeIn {
  0% {
    opacity: 0;
    -o-transform: scale(1, 0);
    transform: scale(1, 0);
  }
  100% {
    opacity: 1;
    -o-transform: scale(1, 1);
    transform: scale(1, 1);
  }
}
@keyframes scaleDownFadeIn {
  0% {
    opacity: 0;
    -webkit-transform: scale(1, 0);
    -moz-transform: scale(1, 0);
    -o-transform: scale(1, 0);
    transform: scale(1, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1, 1);
    -moz-transform: scale(1, 1);
    -o-transform: scale(1, 1);
    transform: scale(1, 1);
  }
}
@-webkit-keyframes tagLineSlideIn {
  0% {
    -webkit-transform: translate(-3.5vw, 0);
    transform: translate(-3.5vw, 0);
    -webkit-clip-path: inset(-1vw 0 -1vw 3vw);
    clip-path: inset(-1vw 0 -1vw 3vw);
  }
  100% {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    -webkit-clip-path: inset(-1vw 0 -1vw 0);
    clip-path: inset(-1vw 0 -1vw 0);
  }
}
@-moz-keyframes tagLineSlideIn {
  0% {
    -moz-transform: translate(-3.5vw, 0);
    transform: translate(-3.5vw, 0);
    clip-path: inset(-1vw 0 -1vw 3vw);
  }
  100% {
    -moz-transform: translate(0, 0);
    transform: translate(0, 0);
    clip-path: inset(-1vw 0 -1vw 0);
  }
}
@-o-keyframes tagLineSlideIn {
  0% {
    -o-transform: translate(-3.5vw, 0);
    transform: translate(-3.5vw, 0);
    clip-path: inset(-1vw 0 -1vw 3vw);
  }
  100% {
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    clip-path: inset(-1vw 0 -1vw 0);
  }
}
@keyframes tagLineSlideIn {
  0% {
    -webkit-transform: translate(-3.5vw, 0);
    -moz-transform: translate(-3.5vw, 0);
    -o-transform: translate(-3.5vw, 0);
    transform: translate(-3.5vw, 0);
    -webkit-clip-path: inset(-1vw 0 -1vw 3vw);
    clip-path: inset(-1vw 0 -1vw 3vw);
  }
  100% {
    -webkit-transform: translate(0, 0);
    -moz-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    -webkit-clip-path: inset(-1vw 0 -1vw 0);
    clip-path: inset(-1vw 0 -1vw 0);
  }
}
.preRollChromeIntroAnimation .preRollTrailerTitleLogo {
  opacity: 0;
}
.preRollChromeIntroAnimation .preRollTrailerTitle {
  opacity: 0;
}
.preRollChromeIntroAnimation .preRollTagLine {
  -webkit-transform: translate(-3.5vw, 0);
  -moz-transform: translate(-3.5vw, 0);
  -ms-transform: translate(-3.5vw, 0);
  -o-transform: translate(-3.5vw, 0);
  transform: translate(-3.5vw, 0);
  -webkit-clip-path: inset(-1vw 0 -1vw 3vw);
  clip-path: inset(-1vw 0 -1vw 3vw);
}
.preRollChromeIntroAnimation .preRollTagLineFade {
  opacity: 0;
}
.preRollChromeIntroAnimation .mylist-button {
  opacity: 0;
}
.preRollChromeIntroAnimation .redBlock {
  opacity: 0;
  -webkit-transform: scale(1, 0);
  -moz-transform: scale(1, 0);
  -ms-transform: scale(1, 0);
  -o-transform: scale(1, 0);
  transform: scale(1, 0);
}
.preRollChromeIntroAnimation .preRollSkipButton {
  opacity: 0;
}
.preRollChromeIntroAnimation .preRollTrailerTitle,
.preRollChromeIntroAnimation .preRollTrailerTitleLogo {
  -webkit-animation: fadeOut;
  -moz-animation: fadeOut;
  -o-animation: fadeOut;
  animation: fadeOut;
  -webkit-animation-direction: reverse;
  -moz-animation-direction: reverse;
  -o-animation-direction: reverse;
  animation-direction: reverse;
  -webkit-animation-duration: 584ms;
  -moz-animation-duration: 584ms;
  -o-animation-duration: 584ms;
  animation-duration: 584ms;
  -webkit-animation-timing-function: cubic-bezier(0.33, 0, 0.67, 1);
  -moz-animation-timing-function: cubic-bezier(0.33, 0, 0.67, 1);
  -o-animation-timing-function: cubic-bezier(0.33, 0, 0.67, 1);
  animation-timing-function: cubic-bezier(0.33, 0, 0.67, 1);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.preRollChromeIntroAnimation .preRollTagLine {
  -webkit-animation: tagLineSlideIn;
  -moz-animation: tagLineSlideIn;
  -o-animation: tagLineSlideIn;
  animation: tagLineSlideIn;
  -webkit-animation-duration: 0.5s;
  -moz-animation-duration: 0.5s;
  -o-animation-duration: 0.5s;
  animation-duration: 0.5s;
  -webkit-animation-delay: 0.5s;
  -moz-animation-delay: 0.5s;
  -o-animation-delay: 0.5s;
  animation-delay: 0.5s;
  -webkit-animation-timing-function: cubic-bezier(0.17, 0.17, 0.3, 1);
  -moz-animation-timing-function: cubic-bezier(0.17, 0.17, 0.3, 1);
  -o-animation-timing-function: cubic-bezier(0.17, 0.17, 0.3, 1);
  animation-timing-function: cubic-bezier(0.17, 0.17, 0.3, 1);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.preRollChromeIntroAnimation .preRollTagLineFade {
  -webkit-animation: fadeOut;
  -moz-animation: fadeOut;
  -o-animation: fadeOut;
  animation: fadeOut;
  -webkit-animation-duration: 1s;
  -moz-animation-duration: 1s;
  -o-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-direction: reverse;
  -moz-animation-direction: reverse;
  -o-animation-direction: reverse;
  animation-direction: reverse;
  -webkit-animation-delay: 0.2s;
  -moz-animation-delay: 0.2s;
  -o-animation-delay: 0.2s;
  animation-delay: 0.2s;
  -webkit-animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  -moz-animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  -o-animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.preRollChromeIntroAnimation .redBlock {
  -webkit-animation: scaleDownFadeIn;
  -moz-animation: scaleDownFadeIn;
  -o-animation: scaleDownFadeIn;
  animation: scaleDownFadeIn;
  -webkit-animation-duration: 0.5s;
  -moz-animation-duration: 0.5s;
  -o-animation-duration: 0.5s;
  animation-duration: 0.5s;
  -webkit-animation-delay: 0.333s;
  -moz-animation-delay: 0.333s;
  -o-animation-delay: 0.333s;
  animation-delay: 0.333s;
  -webkit-animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  -moz-animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  -o-animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.preRollChromeIntroAnimation .mylist-button {
  -webkit-animation: fadeOut;
  -moz-animation: fadeOut;
  -o-animation: fadeOut;
  animation: fadeOut;
  -webkit-animation-duration: 584ms;
  -moz-animation-duration: 584ms;
  -o-animation-duration: 584ms;
  animation-duration: 584ms;
  -webkit-animation-direction: reverse;
  -moz-animation-direction: reverse;
  -o-animation-direction: reverse;
  animation-direction: reverse;
  -webkit-animation-delay: 750ms;
  -moz-animation-delay: 750ms;
  -o-animation-delay: 750ms;
  animation-delay: 750ms;
  -webkit-animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  -moz-animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  -o-animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  animation-timing-function: cubic-bezier(0.17, 0.17, 0.68, 1);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.preRollChromeIntroAnimation .preRollSkipButton {
  -webkit-animation: fadeOut;
  -moz-animation: fadeOut;
  -o-animation: fadeOut;
  animation: fadeOut;
  -webkit-animation-direction: reverse;
  -moz-animation-direction: reverse;
  -o-animation-direction: reverse;
  animation-direction: reverse;
  -webkit-animation-delay: 584ms;
  -moz-animation-delay: 584ms;
  -o-animation-delay: 584ms;
  animation-delay: 584ms;
  -webkit-animation-duration: 584ms;
  -moz-animation-duration: 584ms;
  -o-animation-duration: 584ms;
  animation-duration: 584ms;
  -webkit-animation-timing-function: cubic-bezier(0.33, 0, 0.67, 1);
  -moz-animation-timing-function: cubic-bezier(0.33, 0, 0.67, 1);
  -o-animation-timing-function: cubic-bezier(0.33, 0, 0.67, 1);
  animation-timing-function: cubic-bezier(0.33, 0, 0.67, 1);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.preRollChromeOutroAnimation .preRollBlackCover {
  opacity: 0;
}
.preRollChromeOutroAnimation .preRollBlackCover {
  -webkit-animation: fadeOut;
  -moz-animation: fadeOut;
  -o-animation: fadeOut;
  animation: fadeOut;
  -webkit-animation-direction: reverse;
  -moz-animation-direction: reverse;
  -o-animation-direction: reverse;
  animation-direction: reverse;
  -webkit-animation-delay: 0.5s;
  -moz-animation-delay: 0.5s;
  -o-animation-delay: 0.5s;
  animation-delay: 0.5s;
  -webkit-animation-duration: 0.5s;
  -moz-animation-duration: 0.5s;
  -o-animation-duration: 0.5s;
  animation-duration: 0.5s;
}
@-webkit-keyframes slideOutAndFadeOut {
  0% {
    opacity: 1;
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
  }
  100% {
    opacity: 0;
    -webkit-transform: translate(27px, 0);
    transform: translate(27px, 0);
  }
}
@-moz-keyframes slideOutAndFadeOut {
  0% {
    opacity: 1;
    -moz-transform: translate(0, 0);
    transform: translate(0, 0);
  }
  100% {
    opacity: 0;
    -moz-transform: translate(27px, 0);
    transform: translate(27px, 0);
  }
}
@-o-keyframes slideOutAndFadeOut {
  0% {
    opacity: 1;
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
  }
  100% {
    opacity: 0;
    -o-transform: translate(27px, 0);
    transform: translate(27px, 0);
  }
}
@keyframes slideOutAndFadeOut {
  0% {
    opacity: 1;
    -webkit-transform: translate(0, 0);
    -moz-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
  }
  100% {
    opacity: 0;
    -webkit-transform: translate(27px, 0);
    -moz-transform: translate(27px, 0);
    -o-transform: translate(27px, 0);
    transform: translate(27px, 0);
  }
}
.preRollChromeOutroAnimation .preRollTrailerTitle,
.preRollChromeOutroAnimation .preRollTrailerTitleLogo {
  -webkit-animation: slideOutAndFadeOut;
  -moz-animation: slideOutAndFadeOut;
  -o-animation: slideOutAndFadeOut;
  animation: slideOutAndFadeOut;
  -webkit-animation-duration: 334ms;
  -moz-animation-duration: 334ms;
  -o-animation-duration: 334ms;
  animation-duration: 334ms;
  -webkit-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -moz-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -o-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.preRollChromeOutroAnimation .redBlock {
  -webkit-animation: slideOutAndFadeOut;
  -moz-animation: slideOutAndFadeOut;
  -o-animation: slideOutAndFadeOut;
  animation: slideOutAndFadeOut;
  -webkit-animation-delay: 125ms;
  -moz-animation-delay: 125ms;
  -o-animation-delay: 125ms;
  animation-delay: 125ms;
  -webkit-animation-duration: 334ms;
  -moz-animation-duration: 334ms;
  -o-animation-duration: 334ms;
  animation-duration: 334ms;
  -webkit-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -moz-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -o-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.preRollChromeOutroAnimation .preRollSkipButton,
.preRollChromeOutroAnimation .preRollTagLine {
  -webkit-animation: slideOutAndFadeOut;
  -moz-animation: slideOutAndFadeOut;
  -o-animation: slideOutAndFadeOut;
  animation: slideOutAndFadeOut;
  -webkit-animation-delay: 167ms;
  -moz-animation-delay: 167ms;
  -o-animation-delay: 167ms;
  animation-delay: 167ms;
  -webkit-animation-duration: 334ms;
  -moz-animation-duration: 334ms;
  -o-animation-duration: 334ms;
  animation-duration: 334ms;
  -webkit-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -moz-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -o-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
.preRollChromeOutroAnimation .mylist-button {
  -webkit-animation: slideOutAndFadeOut;
  -moz-animation: slideOutAndFadeOut;
  -o-animation: slideOutAndFadeOut;
  animation: slideOutAndFadeOut;
  -webkit-animation-delay: 207ms;
  -moz-animation-delay: 207ms;
  -o-animation-delay: 207ms;
  animation-delay: 207ms;
  -webkit-animation-duration: 334ms;
  -moz-animation-duration: 334ms;
  -o-animation-duration: 334ms;
  animation-duration: 334ms;
  -webkit-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -moz-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -o-animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  animation-timing-function: cubic-bezier(0.17, 0.17, 0.67, 1);
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
}
@-webkit-keyframes nowPlayingSlideInFadeIn {
  0% {
    opacity: 0;
    -webkit-transform: translate(-55px, 0);
    transform: translate(-55px, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
  }
}
@-moz-keyframes nowPlayingSlideInFadeIn {
  0% {
    opacity: 0;
    -moz-transform: translate(-55px, 0);
    transform: translate(-55px, 0);
  }
  100% {
    opacity: 1;
    -moz-transform: translate(0, 0);
    transform: translate(0, 0);
  }
}
@-o-keyframes nowPlayingSlideInFadeIn {
  0% {
    opacity: 0;
    -o-transform: translate(-55px, 0);
    transform: translate(-55px, 0);
  }
  100% {
    opacity: 1;
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
  }
}
@keyframes nowPlayingSlideInFadeIn {
  0% {
    opacity: 0;
    -webkit-transform: translate(-55px, 0);
    -moz-transform: translate(-55px, 0);
    -o-transform: translate(-55px, 0);
    transform: translate(-55px, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: translate(0, 0);
    -moz-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
  }
}
.preRollChromeOutroAnimation .preRollNowPlaying {
  -webkit-animation: fadeOut;
  -moz-animation: fadeOut;
  -o-animation: fadeOut;
  animation: fadeOut;
  -webkit-animation-direction: reverse;
  -moz-animation-direction: reverse;
  -o-animation-direction: reverse;
  animation-direction: reverse;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-duration: 0.5s;
  -moz-animation-duration: 0.5s;
  -o-animation-duration: 0.5s;
  animation-duration: 0.5s;
  -webkit-animation-delay: 0.5s;
  -moz-animation-delay: 0.5s;
  -o-animation-delay: 0.5s;
  animation-delay: 0.5s;
}
.preRollChromeOutroAnimation .preRollNowPlaying .preRollTitle {
  -webkit-animation: nowPlayingSlideInFadeIn;
  -moz-animation: nowPlayingSlideInFadeIn;
  -o-animation: nowPlayingSlideInFadeIn;
  animation: nowPlayingSlideInFadeIn;
  -webkit-animation-duration: 417ms;
  -moz-animation-duration: 417ms;
  -o-animation-duration: 417ms;
  animation-duration: 417ms;
  -webkit-animation-delay: 792ms;
  -moz-animation-delay: 792ms;
  -o-animation-delay: 792ms;
  animation-delay: 792ms;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-timing-function: cubic-bezier(0.17, 0.17, 0.5, 1);
  -moz-animation-timing-function: cubic-bezier(0.17, 0.17, 0.5, 1);
  -o-animation-timing-function: cubic-bezier(0.17, 0.17, 0.5, 1);
  animation-timing-function: cubic-bezier(0.17, 0.17, 0.5, 1);
}
.preRollChromeOutroAnimation .preRollNowPlaying .preRollLabel {
  -webkit-animation: nowPlayingSlideInFadeIn;
  -moz-animation: nowPlayingSlideInFadeIn;
  -o-animation: nowPlayingSlideInFadeIn;
  animation: nowPlayingSlideInFadeIn;
  -webkit-animation-duration: 584ms;
  -moz-animation-duration: 584ms;
  -o-animation-duration: 584ms;
  animation-duration: 584ms;
  -webkit-animation-delay: 0.5s;
  -moz-animation-delay: 0.5s;
  -o-animation-delay: 0.5s;
  animation-delay: 0.5s;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-fill-mode: forwards;
  -o-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  -webkit-animation-timing-function: cubic-bezier(0.17, 0.17, 0.5, 1);
  -moz-animation-timing-function: cubic-bezier(0.17, 0.17, 0.5, 1);
  -o-animation-timing-function: cubic-bezier(0.17, 0.17, 0.5, 1);
  animation-timing-function: cubic-bezier(0.17, 0.17, 0.5, 1);
}
.Recommendation {
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  cursor: pointer;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  height: 9.23em;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  position: relative;
  width: 6.5em;
}
.Recommendation-boxshot,
.Recommendation-boxshot-active {
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background-iosition: center bottom;
  background-iepeat: no-repeat;
  -moz-background-size: 100%;
  background-size: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  height: 4.53em;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-transition: width 0.2s ease-out, height 0.2s ease-out;
  -o-transition: width 0.2s ease-out, height 0.2s ease-out;
  -moz-transition: width 0.2s ease-out, height 0.2s ease-out;
  transition: width 0.2s ease-out, height 0.2s ease-out;
  width: 3.25em;
  position: relative;
}
.Recommendation-boxshot-active {
  height: 9em;
  width: 6.5em;
}
.Recommendation-boxshot-active .PlayIcon {
  opacity: 0.8;
  visibility: visible;
}
.Recommendation-bob,
.Recommendation-bob-visible {
  background-color: #222;
  bottom: 1.2em;
  color: #fff;
  font-size: 26px;
  left: -13.35em;
  opacity: 0;
  pointer-events: none;
  position: absolute;
  -webkit-transition: opacity 0.3s ease-in-out;
  -o-transition: opacity 0.3s ease-in-out;
  -moz-transition: opacity 0.3s ease-in-out;
  transition: opacity 0.3s ease-in-out;
  width: 12.6em;
}
.Recommendation-bob-visible:after {
  border-color: rgba(34, 34, 34, 0);
  border-left-color: #222;
  border-style: solid;
  border-width: 0.75em;
  content: " ";
  height: 0;
  left: 100%;
  margin-top: -0.75em;
  pointer-events: none;
  position: absolute;
  top: 50%;
  width: 0;
}
.Recommendation-bob-visible {
  opacity: 1;
}
.Recommendation-bob-movie-header {
  background-color: #bb000d;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  font-size: 0.5em;
  font-weight: 700;
  line-height: 1.8em;
  padding: 0.66em 1em;
}
.Recommendation-bob-movie-title {
  display: block;
  font-size: 1.5em;
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.Recommendation-bob-movie-attributes {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  padding: 0.5em 0 0;
}
.Recommendation-bob-movie-attributes-duration,
.Recommendation-bob-movie-attributes-year {
  margin-right: 1em;
}
.Recommendation-bob-movie-attributes-rating {
  border: 1px solid #fff;
  margin-right: 1em;
  padding: 0 0.4em;
}
.Recommendation-bob-movie-content {
  font-size: 0.66em;
  line-height: 1.25em;
  padding: 0.66em 0.75757576em;
}
.Recommendation-bob-content-info > ul {
  list-style: none;
  margin: 0.66em 0 0;
  padding: 0;
}
.Recommendation-bob-content-info > ul > li {
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.Recommendation-bob-movie-content-info > ul {
  margin: 0.66em 0 0;
  padding: 0;
  list-style: none;
}
.Recommendation-bob-movie-content-info > ul > li {
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.Recommendation-bob-movie-content-info > ul > li > span {
  font-weight: 700;
  margin-right: 0.3em;
}
.Recommendation-bob-movie-content-info > ul > li > span + span {
  font-weight: 400;
  margin-right: 0;
}
.PlayerSpace {
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background-color: transparent;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  height: 25.6em;
  left: 4em;
  min-height: 160px;
  position: absolute;
  top: 14em;
}
.PlayerSpace-player {
  height: 100%;
  width: 40.5em;
}
.PlayerSpace-additional-content {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding-left: 1.5em;
}
.PlayerSpace .pp-rating-container {
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background-color: #000;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  cursor: default;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  height: 100%;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  left: 0 !important;
  position: relative;
  top: 0 !important;
  width: 100%;
}
.PlayerSpace .pp-rating-container .pp-rating-title {
  -webkit-box-flex: initial;
  -webkit-flex: initial;
  -moz-box-flex: initial;
  -ms-flex: initial;
  flex: initial;
  font-size: 2.2em;
  margin-right: 0.5em;
  text-shadow: 1px 1px #000;
}
.PlayerSpace .pp-thumbs-wrapper {
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  background: rgba(0, 0, 0, 0.4);
  -webkit-border-radius: 0 0 0.4em 0.4em;
  -moz-border-radius: 0 0 0.4em 0.4em;
  border-radius: 0 0 0.4em 0.4em;
  border-bottom: 0.1em solid #000;
  border-left: 0.1em solid #000;
  border-right: 0.1em solid #000;
  border-top: none;
  left: 0;
  bottom: -9em;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  height: 8.8em;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -moz-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  padding: 0 1em;
  position: absolute;
  text-align: left;
  -webkit-transition: bottom 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  -o-transition: bottom 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  -moz-transition: bottom 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  transition: bottom 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  z-index: 2;
}
.PlayerSpace .pp-thumbs-wrapper .current-video-title {
  -webkit-box-flex: 1;
  -webkit-flex: 1 0;
  -moz-box-flex: 1;
  -ms-flex: 1 0;
  flex: 1 0;
  line-height: 1.2;
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.PlayerSpace .pp-thumbs-wrapper .pp-rating-title {
  font-size: 2.8em;
  font-weight: 700;
  text-shadow: 1px 1px #000;
}
.PlayerSpace .pp-thumbs-wrapper .pp-thumbs-container {
  height: auto;
  margin: 0;
  position: relative;
  width: 12em;
}
.PlayerSpace .pp-stars-wrapper {
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  bottom: -3.3em;
  color: #fff;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  height: auto;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  left: 0;
  position: absolute;
  width: 100%;
  z-index: 1;
}
.PlayerSpace .starbar {
  font-size: 1.2em;
  margin: 0 0 0 0.5em;
  width: 16.6em;
}
.PlayerSpace .starbar .star {
  font-size: 2em;
}
.PlayerSpace .starbar .star.sb-placeholder {
  color: #fff;
}
.Recommendations {
  -webkit-font-smoothing: antialiased;
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  background-color: #000;
  bottom: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  left: 0;
  position: absolute;
  right: 0;
  text-shadow: 1px 1px #000;
  top: 0;
  z-index: 0;
}
.Recommendations-background {
  background-position: 50% 0;
  background-repeat: no-repeat;
  -moz-background-size: cover;
  background-size: cover;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -2;
}
.Recommendations-background-gradient {
  background-color: transparent;
  background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    from(#000),
    color-stop(40%, rgba(0, 0, 0, 0.3)),
    color-stop(40%, rgba(0, 0, 0, 0))
  );
  background-image: -webkit-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: -moz-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: -o-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: linear-gradient(
    to top,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-repeat: no-repeat;
  -moz-background-size: 100% 100%;
  background-size: 100% 100%;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -1;
}
.Recommendations-footer {
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  background-image: -webkit-gradient(
    linear,
    left top,
    right top,
    from(rgba(0, 0, 0, 0)),
    to(rgba(0, 0, 0, 0.65))
  );
  background-image: -webkit-linear-gradient(
    left,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  background-image: -moz-linear-gradient(
    left,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  background-image: -o-linear-gradient(
    left,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  background-image: linear-gradient(
    to right,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  text-shadow: 0 1px #000;
  width: 80%;
}
.Recommendations-recommend-text {
  color: #fff;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
  -moz-box-flex: 1;
  -ms-flex: 1;
  flex: 1;
  font-size: 3em;
  margin: 0 1.33em 1em 1.33em;
  min-width: 12em;
}
.Recommendations-recommend-header {
  color: #cd0007;
  font-size: 2em;
  line-height: 1;
  margin: 0 0 0.2em 0;
}
.Recommendations-recommend-subheader {
  color: #fff;
  line-height: 1;
  margin: 0;
}
.Recommendations-action-buttons {
  color: #ccc;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  font-size: 24px;
  margin: 0.5em 0;
}
.Recommendations-recommendations {
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  font-size: 4em;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  margin: 0 1em 1em 0;
  min-width: 12em;
}
.Recommendations-action-buttons {
  color: #ccc;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  font-size: 1em;
  margin: 0.5em 0 0.1em 0;
}
.Recommendations-action-buttons .nf-icon-button.nf-flat-button {
  font-size: 0.65em;
  text-transform: none;
}
.Recommendations-experience {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
.Recommendations-experience-title {
  -webkit-align-self: flex-start;
  -ms-flex-item-align: start;
  align-self: flex-start;
  font-size: 4em;
  font-weight: 700;
  margin-bottom: 1em;
}
.Recommendations-experience-actions .nf-icon-button.nf-flat-button {
  text-transform: none;
}
.WatchNext {
  -webkit-font-smoothing: antialiased;
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  background-color: #000;
  bottom: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  left: 0;
  position: absolute;
  right: 0;
  text-shadow: 1px 1px #000;
  top: 0;
  z-index: 0;
}
.WatchNext .nf-player-container:hover {
  border: 0.3em solid #fff;
}
.WatchNext-background {
  background-position: 50% 0;
  background-repeat: no-repeat;
  -moz-background-size: cover;
  background-size: cover;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -2;
}
.WatchNext-background-gradient {
  background-color: transparent;
  background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    from(#000),
    color-stop(40%, rgba(0, 0, 0, 0.3)),
    color-stop(40%, rgba(0, 0, 0, 0))
  );
  background-image: -webkit-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: -moz-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: -o-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: linear-gradient(
    to top,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-repeat: no-repeat;
  -moz-background-size: 100% 100%;
  background-size: 100% 100%;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -1;
}
.WatchNext-footer {
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  background-image: -webkit-gradient(
    linear,
    left top,
    right top,
    from(rgba(0, 0, 0, 0)),
    to(rgba(0, 0, 0, 0.65))
  );
  background-image: -webkit-linear-gradient(
    left,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  background-image: -moz-linear-gradient(
    left,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  background-image: -o-linear-gradient(
    left,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  background-image: linear-gradient(
    to right,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  text-shadow: 0 1px #000;
  width: 80%;
  position: absolute;
  bottom: 0;
  right: 0;
}
.WatchNext-show-info {
  color: #eee;
  -webkit-box-flex: 1.1;
  -webkit-flex: 1.1 0 0;
  -moz-box-flex: 1.1;
  -ms-flex: 1.1 0 0px;
  flex: 1.1 0 0;
  font-size: 3em;
  margin-bottom: 2.6em;
  margin-right: 2em;
  min-width: 8em;
}
.WatchNext-show-info-container {
  float: right;
}
.WatchNext-show-title {
  font-weight: 700;
  margin: 0 0 0.1em 0;
}
.WatchNext-episode-title {
  font-size: 0.75em;
  font-weight: 700;
  margin: 0;
}
.WatchNext-episode-info {
  font-size: 0.6em;
  margin: 0.4em 0;
}
.WatchNext-episode-synopsis {
  font-size: 0.6em;
  font-weight: 700;
  margin-bottom: 1em;
}
.WatchNext-autoplay {
  color: #eee;
  cursor: pointer;
  font-size: 3em;
  margin: 0 1em 1em 0;
}
.WatchNext-still-container {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin-left: auto;
  position: relative;
  width: 17.5em;
}
.WatchNext-still {
  width: 100%;
  top: 0;
  left: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border: 0.1em solid transparent;
  -webkit-transition: border 0.1s ease-out;
  -o-transition: border 0.1s ease-out;
  -moz-transition: border 0.1s ease-out;
  transition: border 0.1s ease-out;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.WatchNext-still-container:hover .WatchNext-still {
  border: 0.1em solid #fff;
}
.WatchNext-still-hover-container {
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  height: 100%;
  width: 100%;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  position: absolute;
  top: 0;
  left: 0;
}
.WatchNext-still-hover-container .PlayIcon {
  opacity: 0.7;
  -webkit-transition: opacity 0.2s ease-out, -webkit-transform 0.2s ease-out;
  transition: opacity 0.2s ease-out, -webkit-transform 0.2s ease-out;
  -o-transition: opacity 0.2s ease-out, -o-transform 0.2s ease-out;
  -moz-transition: opacity 0.2s ease-out, transform 0.2s ease-out,
    -moz-transform 0.2s ease-out;
  transition: opacity 0.2s ease-out, transform 0.2s ease-out;
  transition: opacity 0.2s ease-out, transform 0.2s ease-out,
    -webkit-transform 0.2s ease-out, -moz-transform 0.2s ease-out,
    -o-transform 0.2s ease-out;
}
.WatchNext-still-hover-container:hover .PlayIcon {
  opacity: 1;
  -webkit-transform: scale(1.2);
  -moz-transform: scale(1.2);
  -ms-transform: scale(1.2);
  -o-transform: scale(1.2);
  transform: scale(1.2);
}
.WatchNext-nsre-info {
  bottom: 0;
  left: 0;
  padding: 0.3em;
  position: absolute;
}
.WatchNext-nsre-info > h1 {
  font-size: 1em;
  margin: 0 0 0.1em 0;
}
.WatchNext-nsre-title {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  margin: 0 0 0.1em 0;
}
.WatchNext-nsre-title > h2 {
  font-size: 0.6em;
  margin: 0 0 0.1em 0;
}
.WatchNext-badges {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.WatchNext-badge {
  background-color: #e22024;
  font-size: 0.45em;
  margin: 0.2em 0.2em 0.1em 0.2em;
  padding: 0.1em 0.3em;
}
.WatchNext-nsre-time {
  font-size: 0.5em;
  margin: 0 0 0.1em 0;
}
.WatchNext-nsre-time-separator {
  margin: 0 0.3em;
}
.WatchNext-action-buttons {
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  color: #ccc;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  font-size: 1em;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  margin: 0.5em 0 0.1em 0;
  text-align: right;
  width: 100%;
}
.WatchNext-action-buttons .nf-icon-button.nf-flat-button.no-icon {
  font-size: 0.65em;
  text-transform: none;
}
.WatchNext-more-container {
  display: inline-block;
  position: relative;
}
.WatchNext-autoplay .countdown-container {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: block;
  font-size: 0.8em;
  margin: 0.2em 0.2em 0.2em auto;
  width: 21.7em;
}
.WatchNext-autoplay .countdown-container > strong {
  color: #b9090b;
}
.WatchNext-more-container.legacy-controls-styles .nf-flat-button.no-icon {
  margin-right: 0;
}
.WatchNext-more-container.legacy-controls-styles .popup-content-wrapper {
  bottom: 137%;
  font-size: 0.2677em;
  text-align: left;
}
.WatchNext-more-container.legacy-controls-styles .popup-content.rtl:after {
  left: 0; /*!rtl:ignore*/
  right: auto; /*!rtl:ignore*/
  margin-left: 11em; /*!rtl:ignore*/
}
.BackToBrowse {
  position: absolute;
  z-index: 2;
  top: 2.75em;
  left: 2.75em;
  -webkit-transition: color 150ms ease-in, opacity 0.4s ease-out;
  -o-transition: color 150ms ease-in, opacity 0.4s ease-out;
  -moz-transition: color 150ms ease-in, opacity 0.4s ease-out;
  transition: color 150ms ease-in, opacity 0.4s ease-out;
  text-shadow: 1px 1px 1px #000; /*!rtl:ignore*/
  font-weight: 700;
  opacity: 1;
  text-decoration: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  cursor: pointer;
  background-color: transparent;
}
.BackToBrowse:hover > div {
  opacity: 1;
}
.BackToBrowse > svg {
  -webkit-transition: fill 150ms ease-in;
  -o-transition: fill 150ms ease-in;
  -moz-transition: fill 150ms ease-in;
  transition: fill 150ms ease-in;
  fill: #dadada;
  padding: 0.75em;
  width: 6.75em;
  height: 6.75em;
}
.BackToBrowse:hover > svg {
  fill: #fff;
}
.BackToBrowse > div {
  border: none;
  padding: 0;
  background: 0 0;
  opacity: 0.75;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  font-weight: 400;
  color: #fff;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  position: absolute;
  margin: 0;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  pointer-events: none;
  white-space: nowrap;
  left: 4.25em;
  top: 1.3em;
  font-size: 2.2em;
  -webkit-transition: opacity 150ms ease-in;
  -o-transition: opacity 150ms ease-in;
  -moz-transition: opacity 150ms ease-in;
  transition: opacity 150ms ease-in;
}
.OriginalsLogo {
  border: 0;
  min-height: 0;
  width: 100%;
}
.OriginalsLogo-text {
  font-size: 1.5em;
  font-weight: 700;
}
.PromotedVideo {
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: start;
  -webkit-align-items: flex-start;
  -moz-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  font-size: 20px;
  -webkit-box-pack: start;
  -webkit-justify-content: flex-start;
  -moz-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
}
.PromotedVideo-message {
  color: #fff;
  font-size: 1.4em;
  font-weight: 700;
  margin: 0.5em 0;
  width: 100%;
}
.PromotedVideo-synopsis {
  color: #fff;
  font-weight: 400;
  margin: 0.5em 0;
  width: 100%;
}
.PromotedVideo-moreinfo {
  color: #e50911;
  cursor: pointer;
  margin-left: 0.5em;
  text-decoration: none;
}
.PromotedVideo-countdown {
  color: #eee;
  cursor: pointer;
  margin: 0;
}
.PromotedVideo-countdown .countdown-container {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: block;
  font-size: 1.5em;
  margin: 0.2em 0.2em 0.2em auto;
}
.PromotedVideo-countdown .countdown-container > strong {
  color: #b9090b;
}
.PromotedVideo-actions {
  color: #ccc;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  font-size: 24px;
  margin: 0.5em 0;
}
.OriginalsPostPlay {
  -webkit-font-smoothing: antialiased;
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  background-color: #000;
  bottom: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  left: 0;
  position: absolute;
  right: 0;
  text-shadow: 1px 1px #000;
  top: 0;
  z-index: 0;
}
.OriginalsPostPlay .nf-player-container:hover {
  border: 0.3em solid #fff;
}
.OriginalsPostPlay-background {
  background-position: 50% 0;
  background-repeat: no-repeat;
  -moz-background-size: cover;
  background-size: cover;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -2;
}
.OriginalsPostPlay-background-gradient {
  background-color: transparent;
  background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    from(#000),
    color-stop(40%, rgba(0, 0, 0, 0.3)),
    color-stop(40%, rgba(0, 0, 0, 0))
  );
  background-image: -webkit-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: -moz-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: -o-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: linear-gradient(
    to top,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-repeat: no-repeat;
  -moz-background-size: 100% 100%;
  background-size: 100% 100%;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -1;
}
.OriginalsPostPlay-message {
  color: #fff;
  font-size: 24px;
  margin: 0 1.33em 4em 1.33em;
  max-width: 18em;
  position: absolute;
  left: 0;
  bottom: 0;
}
.OriginalsPostPlay-message > h1 {
  color: #f90000;
  font-size: 1.7em;
  margin: 0 0 0.2em 0;
}
.OriginalsPostPlay-message > h2 {
  margin: 0;
}
.OriginalsPostPlay-promo-container {
  margin: 0 1em 5em 1em;
  width: 45%;
}
.EpisodicTeaser {
  -webkit-font-smoothing: antialiased;
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  background-color: #000;
  bottom: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  left: 0;
  position: absolute;
  right: 0;
  text-shadow: 1px 1px #000;
  top: 0;
  z-index: 0;
}
.EpisodicTeaser .nf-player-container:hover {
  border: 0.3em solid #fff;
}
.EpisodicTeaser-background {
  background-position: 50% 0;
  background-repeat: no-repeat;
  -moz-background-size: cover;
  background-size: cover;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -2;
}
.EpisodicTeaser-background-gradient {
  background-color: transparent;
  background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    from(#000),
    color-stop(40%, rgba(0, 0, 0, 0.3)),
    color-stop(40%, rgba(0, 0, 0, 0))
  );
  background-image: -webkit-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: -moz-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: -o-linear-gradient(
    bottom,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-image: linear-gradient(
    to top,
    #000,
    rgba(0, 0, 0, 0.3) 40%,
    rgba(0, 0, 0, 0)
  );
  background-repeat: no-repeat;
  -moz-background-size: 100% 100%;
  background-size: 100% 100%;
  bottom: 0;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -1;
}
.EpisodicTeaser-footer {
  -webkit-align-content: flex-end;
  -ms-flex-line-pack: end;
  align-content: flex-end;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
  -moz-box-align: end;
  -ms-flex-align: end;
  align-items: flex-end;
  background-image: -webkit-gradient(
    linear,
    left top,
    right top,
    from(rgba(0, 0, 0, 0)),
    to(rgba(0, 0, 0, 0.65))
  );
  background-image: -webkit-linear-gradient(
    left,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  background-image: -moz-linear-gradient(
    left,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  background-image: -o-linear-gradient(
    left,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  background-image: linear-gradient(
    to right,
    rgba(0, 0, 0, 0),
    rgba(0, 0, 0, 0.65) 100%
  );
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  -webkit-flex-wrap: nowrap;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  text-shadow: 0 1px #000;
  width: 80%;
}
.EpisodicTeaser-autoplay {
  color: #eee;
  cursor: pointer;
  font-size: 3em;
  margin: 0 1em 1em 0;
}
.EpisodicTeaser-display-text {
  font-size: 0.8em;
  margin-top: 0.3em;
}
.EpisodicTeaser-still-container {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin-left: auto;
  position: relative;
  width: 17.5em;
}
.EpisodicTeaser-still-container:hover .EpisodicTeaser-still {
  border: 0.1em solid #fff;
}
.EpisodicTeaser-still {
  width: 100%;
  top: 0;
  left: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border: 0.1em solid transparent;
  -webkit-transition: border 0.1s ease-out;
  -o-transition: border 0.1s ease-out;
  -moz-transition: border 0.1s ease-out;
  transition: border 0.1s ease-out;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.EpisodicTeaser-play-icon {
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
  -webkit-flex-direction: row;
  -moz-box-orient: horizontal;
  -moz-box-direction: normal;
  -ms-flex-direction: row;
  flex-direction: row;
  height: 100%;
  width: 100%;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  position: absolute;
  top: 0;
  left: 0;
}
.EpisodicTeaser-action-buttons {
  color: #ccc;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  font-size: 1em;
  margin: 0.5em 0;
}
.EpisodicTeaser-action-buttons .nf-icon-button.nf-flat-button.no-icon {
  font-size: 0.65em;
  text-transform: none;
}
.EpisodicTeaser-autoplay .countdown-container {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  display: block;
  font-size: 0.8em;
  margin: 0.2em 0.2em 0.2em auto;
  width: 21.7em;
}
.EpisodicTeaser-autoplay .countdown-container > strong {
  color: #b9090b;
}
.AkiraPlayer.nfp.container-large,
.AkiraPlayer.nfp.container-small {
  font-size: inherit !important;
}
.AkiraPlayer .nfp.nf-player-container.NFPlayer.postplay {
  border: 0.3em solid transparent;
  cursor: default;
  height: 25em;
  left: 4em;
  min-height: 160px;
  top: 14em;
  width: 40em;
}
.AkiraPlayer .nfp.nf-player-container.NFPlayer.postplay:hover {
  border: 0.3em solid #fff;
}
.postplay--episode-info-container {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
}
.postplay--episode-maturity-rating {
  padding: 0 1em;
}
.nfp-autoplay-interrupter {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.nfp-autoplay-interrupter > div {
  pointer-events: auto;
}
.nfp-autoplay-interrupter .interrupter-text {
  text-align: center;
  font-size: 1.88888889em;
  font-weight: 300;
  margin-bottom: 0.70588235em;
}
.nfp-autoplay-interrupter .interrupter-actions {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
.pp-rating-container {
  position: absolute;
  top: 16em;
  left: 1.5em;
  z-index: 1;
}
.pp-stars-wrapper {
  -webkit-box-pack: start;
  -webkit-justify-content: flex-start;
  -moz-box-pack: start;
  -ms-flex-pack: start;
  justify-content: flex-start;
}
.pp-stars-wrapper .starbar {
  font-size: 1.33333333em;
  margin-top: 0.33333333em;
}
.pp-stars-wrapper,
.pp-thumbs-wrapper {
  width: 100%;
  height: 100%;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -moz-box-orient: vertical;
  -moz-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -moz-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-align-content: center;
  -ms-flex-line-pack: center;
  align-content: center;
  -webkit-box-align: start;
  -webkit-align-items: flex-start;
  -moz-box-align: start;
  -ms-flex-align: start;
  align-items: flex-start;
  text-align: left;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin-top: 0.77777778em;
}
.pp-rating-title {
  -webkit-box-flex: 1;
  -webkit-flex: 1 0;
  -moz-box-flex: 1;
  -ms-flex: 1 0;
  flex: 1 0;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  font-size: 1.2em;
  font-weight: 700;
}
.pp-thumbs-container {
  text-align: left;
  position: relative;
  width: 5.55555556em;
  height: 2.22222222em;
  margin-top: 0.55555556em;
}
.pp-thumbs-container .thumbs-component {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -moz-box-pack: end;
  -ms-flex-pack: end;
  justify-content: flex-end;
}
.pp-thumbs-container .thumbs-component .nf-svg-button {
  width: 4em;
  height: 4em;
}
.pp-thumbs-container .thumbs-component .nf-svg-button svg {
  width: 2.5em;
  height: 2.5em;
}
.pp-thumbs-container .thumb-container {
  margin: 0 0.44444444em;
}
.pp-thumbs-container .thumb {
  width: 2em;
  height: 2em;
  padding: 0.38888889em;
  border: 0.11111111em solid #fff;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.AkiraPlayer {
  background-color: #000;
  bottom: 0;
  height: 100%;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  width: 100%;
  z-index: 1;
}
.AkiraPlayer.container-large {
  font-size: 24px;
}
.AkiraPlayer.container-large .pp-rating-container,
.AkiraPlayer.container-large .pp-social-links-container {
  left: 1.41666667em;
  top: 15.66666667em;
}
.AkiraPlayer.container-small {
  font-size: 18px;
}
.AkiraPlayer.container-small .pp-rating-container,
.AkiraPlayer.container-small .pp-social-links-container {
  left: 1.5em;
  top: 16em;
}
.AkiraPlayerSpinner--container {
  -webkit-transition: opacity 0.3s ease-out;
  -o-transition: opacity 0.3s ease-out;
  -moz-transition: opacity 0.3s ease-out;
  transition: opacity 0.3s ease-out;
}
body,
html {
  background: #141414;
  color: #fff;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 10px;
  line-height: 1.2;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  cursor: default;
}
@media screen and (min-width: 1000px) {
  body,
  html {
    font-size: 1vw;
  }
}
.svg-icon {
  width: 100%;
  height: 100%;
  pointer-events: none;
}
.bd {
  z-index: 0;
  overflow-x: hidden;
  -ms-overflow-y: hidden;
}
a {
  text-decoration: none;
  cursor: pointer;
  color: #fff;
}
.mainView {
  position: relative;
  min-height: 1000px;
  z-index: 0;
}
.mainView .page-transition-loader {
  padding: 0 4%;
}
.mainView .page-transition-loader .loadingTitle {
  margin: 20px 2px;
}
@media screen and (min-width: 1500px) {
  .mainView .page-transition-loader {
    padding: 0 60px;
  }
}
.title-artwork,
.video-artwork {
  background-repeat: no-repeat;
  background-position: 50% 50%;
  -moz-background-size: 100% 100%;
  background-size: 100% 100%;
  width: 100%;
  padding: 28.125% 0;
}
.video-evidence {
  text-align: center;
  color: grey;
  font-size: 1rem;
  width: 80%;
  margin: 0 auto;
  margin-top: 5px;
  background-color: #141414;
  position: absolute;
  left: 10%;
}
.jawBoneOpen .video-evidence {
  display: none;
}
#playerWrapper .playerError {
  text-align: center;
  padding-top: 200px;
}
.image-preloaders {
  margin-left: -9999px;
}
@-webkit-keyframes spinAnimation {
  0% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinAnimation {
  0% {
    -moz-transform: rotate(0);
    transform: rotate(0);
  }
  100% {
    -moz-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinAnimation {
  0% {
    -o-transform: rotate(0);
    transform: rotate(0);
  }
  100% {
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinAnimation {
  0% {
    -webkit-transform: rotate(0);
    -moz-transform: rotate(0);
    -o-transform: rotate(0);
    transform: rotate(0);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.akira-spinner {
  color: #e50914;
  font-size: 3vw;
  display: inline-block;
  -webkit-animation-duration: 0.75s;
  -moz-animation-duration: 0.75s;
  -o-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-animation-name: spinAnimation;
  -moz-animation-name: spinAnimation;
  -o-animation-name: spinAnimation;
  animation-name: spinAnimation;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  -o-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  -moz-animation-timing-function: linear;
  -o-animation-timing-function: linear;
  animation-timing-function: linear;
}
.pageTransition-enter {
  -webkit-transition-duration: 0.2s;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -webkit-transition-property: opacity;
  -o-transition-property: opacity;
  -moz-transition-property: opacity;
  transition-property: opacity;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
  z-index: 1000;
  opacity: 0;
  display: none;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}
.pageTransition-enter.pageTransition-enter-active {
  opacity: 1;
  display: block;
}
.pageTransition-leave {
  -webkit-transition-duration: 0.2s;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -webkit-transition-property: opacity;
  -o-transition-property: opacity;
  -moz-transition-property: opacity;
  transition-property: opacity;
  -webkit-transition-timing-function: ease-out;
  -moz-transition-timing-function: ease-out;
  -o-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
  opacity: 1;
}
.pageTransition-leave.pageTransition-leave-active {
  opacity: 0;
}
.modal-overlay {
  position: fixed;
  opacity: 0;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 1000;
}
.modal-overlay .modal-overlay-smoked-glass {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.85);
  z-index: 0;
}
.modal-overlay .modal-overlay-content {
  opacity: 0;
  z-index: 1;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  position: absolute;
}
.mt-4 {
    padding-top: 30px;
}
.header-style-one {
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    z-index: 5;
    -webkit-transition: all ease-in-out 0.5s;
    -moz-transition: all ease-in-out 0.5s;
    -ms-transition: all ease-in-out 0.5s;
    -o-transition: all ease-in-out 0.5s;
    transition: all ease-in-out 0.5s;
    color: var(--theme-color);
    background: #141414;
    box-shadow: 0px 4px 55px rgb(24 58 64 / 12%);
}


.header {
  height: 550px;
  padding: 25px 150px;
  box-shadow: 0px -16px 43px 21px rgba(0, 0, 0, 0.6);
  background: url(http://i.imgur.com/E33R3EK.jpg) no-repeat center center fixed;
  background-size: cover;
  overflow: hidden;
}
.header .details {
  padding: 25px 0;
  width: 45%;
}
.header .details .rating {
  display: inline-block;
  font-size: 22px;
  color: #ea292e;
}
.header .details .year,
.header .details .seasons {
  padding: 0 0 0 20px;
  display: inline-block;
  font-size: 20px;
  color: rgba(255, 255, 255, 0.9);
}
.header .details .description {
  padding: 25px 0 0 0;
  font-size: 15px;
  line-height: 26px;
  color: rgba(255, 255, 255, 0.95);
}
.header .details .button {
  margin: 25px 20px 0 0;
}

.button {
  display: inline-block;
  color: rgba(255, 255, 255, 0.9);
  text-decoration: none;
  text-transform: uppercase;
  font-weight: 400;
  padding: 13px 35px;
  border-radius: 7px;
}
.button.red {
  background: rgba(230, 45, 53, 0.5);
}
.button.red:hover {
  background: rgba(230, 45, 53, 0.75);
}
.button.red:active {
  background: rgba(230, 45, 53, 0.9);
}
.button.plain {
  background: rgba(255, 255, 255, 0.15);
}
.button.plain:hover {
  background: rgba(255, 255, 255, 0.3);
}
.button.plain:active {
  background: rgba(255, 255, 255, 0.45);
}
</style>
    <!-- CART -->
    <script>
        $(document).on('click', '.add_to_cart', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: '{{route('user.addToCart', ['__product_id',$store->slug])}}'.replace('__product_id', id),
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    if (response.status == "Success") {
                        show_toastr('Success', response.success, 'success');
                        $('#cart-btn-' + id).html('Already in Cart');
                        $('.sale-section #cart-btn-' + id).html('Already in Cart');
                        $('.cart_item_count').html(response.item_count);
                    } else {
                        show_toastr('Error', response.error, 'error');
                    }

                },
                error: function (result) {
                }
            });
        });
    </script>
@endpush
@section('content')
    <div class="header">
   <img src="https://occ-0-769-768.1.nflxso.net/art/ce656/e3fd62b85404247b2af4a16dc899095b50bce656.webp" />
   <div class="details">
      <div class="rating">★★★★☆</div>
      <div class="year">2017</div>
      <div class="seasons">5 seasons</div>
      <div class="description">House of Cards is an American political drama web television series created by Beau Willimon. It is an adaptation of the BBC's miniseries of the same name and is based on the novel by Michael Dobbs.</div>
      <a href="#play" class="button red">▶ Play</a>
      <a href="#addtoList" class="button plain">＋ My list</a>
   </div>
</div>

<div class="lolomoRow lolomoRow_title_card originals-panels-row mt-4" data-list-context="netflixOriginals" data-reactid="374">
  <h2 class="rowHeader" data-reactid="375">
    <a class="rowTitle originals-row-title" href="/browse/genre/839338" data-reactid="376">
      <div class="row-header-title" data-reactid="377">Meus Cursos</div>
      <div class="aro-row-header" data-reactid="378">
        <div class="see-all-link" data-reactid="379">Ver todos</div>
        <div class="aro-row-chevron icon-akiraCaretRight" data-reactid="380"></div>
      </div>
    </a>
  </h2>
  <div class="rowContainer rowContainer_title_card" id="row-3" data-reactid="381">

    <div class="ptrack-container" data-reactid="382">
      <div class="rowContent slider-hover-trigger-layer" data-reactid="383">
        <div class="slider" data-reactid="384">
          <div class="sliderMask showPeek" data-reactid="393">
            <div class="sliderContent row-with-x-columns" data-reactid="394" >
            @foreach($courses as $course)

              <div class="slider-item slider-item-">
                <div class="title-card-container">
                  <div id="title-card-3-36" class="title-card slider-refocus title-card-tall-panel">
                      <a href="{{route('store.fullscreen',[$store->slug,Crypt::encrypt($course->id),''])}}">
                      <div class="video-artwork video-artwork-tall" style="background-image: url('{{asset(Storage::url('uploads/thumbnail/'.$course->thumbnail))}}');"></div>

                    </a>
                    
                  </div>
                </div>
              </div>
             
              @endforeach

            </div>
          </div>
         </div>
      </div><span class="jawBoneContent" data-reactid="500"></span></div>
  </div>

</div>

<section class="on-sale-section padding-bottom">
@if($courses->count()>0) 

<div class="lolomoRow lolomoRow_title_card originals-panels-row" data-list-context="netflixOriginals" data-reactid="374">
  <h2 class="rowHeader" data-reactid="375">
    <a class="rowTitle originals-row-title" href="/browse/genre/839338" data-reactid="376">
      <div class="row-header-title" data-reactid="377">Adrquirir cursos</div>
      <div class="aro-row-header" data-reactid="378">
        <div class="see-all-link" data-reactid="379">Ver todos</div>
        <div class="aro-row-chevron icon-akiraCaretRight" data-reactid="380"></div>
      </div>
    </a>
  </h2>
  <div class="rowContainer rowContainer_title_card" id="row-3" data-reactid="381">

    <div class="ptrack-container" data-reactid="382">
      <div class="rowContent slider-hover-trigger-layer" data-reactid="383">
        <div class="slider" data-reactid="384">
          <div class="sliderMask showPeek" data-reactid="393">
            <div class="sliderContent row-with-x-columns" data-reactid="394" >
            @foreach($courses as $course)
            @if(!empty($course->discount))   

              <div class="slider-item slider-item-">
                <div class="title-card-container">
                  <div id="title-card-3-36" class="title-card slider-refocus title-card-tall-panel" tabindex="-1" aria-label="Mute">
                    <div class="video-artwork video-artwork-tall ptrack-content" data-ui-tracking-context="%7B%22list_id%22:%22638efe64-a2b1-4c6a-b6ee-f0b401218088_7229743X55XX1522268209153%22,%22location%22:%22homeScreen%22,%22rank%22:36,%22request_id%22:%22af5fcfa5-e6eb-438c-a142-a7728726a3d0-5250457%22,%22row%22:3,%22track_id%22:14751296,%22video_id%22:80119233,%22image_key%22:%22TALL_PANEL_COMBO%7C5207e5e0-1108-11e8-a225-0e7183978422%7Cnl%22,%22supp_video_id%22:1,%22lolomo_id%22:%22638efe64-a2b1-4c6a-b6ee-f0b401218088_ROOT%22,%22uuid%22:%227fb31a06-1318-49b5-8713-9086d171dc70%22,%22appView%22:%22boxArt%22,%22usePresentedEvent%22:true%7D"
                      data-tracking-uuid="7fb31a06-1318-49b5-8713-9086d171dc70"></div>

                     
                      <a href="{{route('store.viewcourse',[$store->slug,\Illuminate\Support\Facades\Crypt::encrypt($course->id)])}}">
                      <div class="video-artwork is-loaded lazy-background-image" data-src="false" style="background-image: url('{{asset(Storage::url('uploads/thumbnail/'.$course->thumbnail))}}');"></div>
                    </a>
                    <div class="video-artwork video-artwork-tall" style="background-image: url('{{asset(Storage::url('uploads/thumbnail/'.$course->thumbnail))}}');"></div>
                   
                    <div class="tall-panel-bob-container"><span></span></div>
                  </div>
                </div>
              </div>
              @endif  

              @endforeach

            </div>
          </div>
         </div>
      </div><span class="jawBoneContent" data-reactid="500"></span></div>
  </div>

</div>


     
@endif  
</section>


    <!-- COURSE   
    @if($courses->count()>0) 
        <section class="on-sale-section padding-top padding-bottom">
            <div class="container">
                <div class="section-title d-flex align-items-center justify-content-between">
                    <h2>{{__('On Sale')}}</h2>
                    <a href="{{route('store.search',[$store->slug])}}" class="btn"> {{__('Show More')}} </a>
                </div>
                <div class="sale-slider slider-comman">
                    @foreach($courses as $course)                               
                        @if(!empty($course->discount))                    
                            <div class="course-widget">
                                <div class="course-widget-inner">
                                    <div class="course-media">
                                        <a href="{{route('store.viewcourse',[$store->slug,\Illuminate\Support\Facades\Crypt::encrypt($course->id)])}}">
                                            {{-- <img src="assets/images/courses.png" alt=""> --}}
                                            @if(!empty($course->thumbnail))
                                                <img alt="Image placeholder" src="{{asset(Storage::url('uploads/thumbnail/'.$course->thumbnail))}}">
                                            @else
                                                <img src="{{asset('assets/img/card-img.svg')}}" alt="card">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="course-caption">
                                        <div class="course-caption-top d-flex align-items-center">
                                            <span class="badge">{{!empty($course->category_id)? $course->category_id->name:'-'}}</span>
                                            <span class="badge sale">{{__('Sale')}}</span>                                      
                                            @if(Auth::guard('students')->check())
                                                @if(sizeof($course->student_wl)>0)
                                                    @foreach($course->student_wl as $student_wl)
                                                        <a href="#" class="wishlist-btn wishlist_btn add_to_wishlist" data-placement="top">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14"
                                                            viewBox="0 0 17 14" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.18991 3.10164C8.89678 3.37992 8.43395 3.37992 8.14082 3.10164L7.61627 2.60366C7.00231 2.0208 6.17289 1.66491 5.25627 1.66491C3.37348 1.66491 1.84718 3.17483 1.84718 5.03741C1.84718 6.82306 2.82429 8.29753 4.23488 9.50902C5.64667 10.7215 7.33461 11.5257 8.34313 11.9361C8.554 12.0219 8.77673 12.0219 8.9876 11.9361C9.99612 11.5257 11.6841 10.7215 13.0959 9.50901C14.5064 8.29753 15.4835 6.82305 15.4835 5.03741C15.4835 3.17483 13.9572 1.66491 12.0745 1.66491C11.1578 1.66491 10.3284 2.0208 9.71446 2.60366L9.18991 3.10164ZM8.66537 1.52219C7.7806 0.682237 6.57937 0.166016 5.25627 0.166016C2.53669 0.166016 0.332031 2.34701 0.332031 5.03741C0.332031 9.81007 5.61259 12.4457 7.76672 13.3223C8.34685 13.5584 8.98388 13.5584 9.56401 13.3223C11.7181 12.4457 16.9987 9.81006 16.9987 5.03741C16.9987 2.34701 14.794 0.166016 12.0745 0.166016C10.7514 0.166016 9.55013 0.682237 8.66537 1.52219Z"
                                                                fill="white"></path>
                                                            </svg> 
                                                        </a>
                                                    @endforeach
                                                @else
                                                    <a class="wishlist-btn add_to_wishlist" data-id="{{$course->id}}" data-placement="top">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14"
                                                        viewBox="0 0 17 14" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.18991 3.10164C8.89678 3.37992 8.43395 3.37992 8.14082 3.10164L7.61627 2.60366C7.00231 2.0208 6.17289 1.66491 5.25627 1.66491C3.37348 1.66491 1.84718 3.17483 1.84718 5.03741C1.84718 6.82306 2.82429 8.29753 4.23488 9.50902C5.64667 10.7215 7.33461 11.5257 8.34313 11.9361C8.554 12.0219 8.77673 12.0219 8.9876 11.9361C9.99612 11.5257 11.6841 10.7215 13.0959 9.50901C14.5064 8.29753 15.4835 6.82305 15.4835 5.03741C15.4835 3.17483 13.9572 1.66491 12.0745 1.66491C11.1578 1.66491 10.3284 2.0208 9.71446 2.60366L9.18991 3.10164ZM8.66537 1.52219C7.7806 0.682237 6.57937 0.166016 5.25627 0.166016C2.53669 0.166016 0.332031 2.34701 0.332031 5.03741C0.332031 9.81007 5.61259 12.4457 7.76672 13.3223C8.34685 13.5584 8.98388 13.5584 9.56401 13.3223C11.7181 12.4457 16.9987 9.81006 16.9987 5.03741C16.9987 2.34701 14.794 0.166016 12.0745 0.166016C10.7514 0.166016 9.55013 0.682237 8.66537 1.52219Z"
                                                            fill="white"></path>
                                                    </svg> 
                                                    </a>
                                                @endif
                                            @else
                                                <a class="wishlist-btn add_to_wishlist" data-id="{{$course->id}}" data-placement="top">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14"
                                                            viewBox="0 0 17 14" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.18991 3.10164C8.89678 3.37992 8.43395 3.37992 8.14082 3.10164L7.61627 2.60366C7.00231 2.0208 6.17289 1.66491 5.25627 1.66491C3.37348 1.66491 1.84718 3.17483 1.84718 5.03741C1.84718 6.82306 2.82429 8.29753 4.23488 9.50902C5.64667 10.7215 7.33461 11.5257 8.34313 11.9361C8.554 12.0219 8.77673 12.0219 8.9876 11.9361C9.99612 11.5257 11.6841 10.7215 13.0959 9.50901C14.5064 8.29753 15.4835 6.82305 15.4835 5.03741C15.4835 3.17483 13.9572 1.66491 12.0745 1.66491C11.1578 1.66491 10.3284 2.0208 9.71446 2.60366L9.18991 3.10164ZM8.66537 1.52219C7.7806 0.682237 6.57937 0.166016 5.25627 0.166016C2.53669 0.166016 0.332031 2.34701 0.332031 5.03741C0.332031 9.81007 5.61259 12.4457 7.76672 13.3223C8.34685 13.5584 8.98388 13.5584 9.56401 13.3223C11.7181 12.4457 16.9987 9.81006 16.9987 5.03741C16.9987 2.34701 14.794 0.166016 12.0745 0.166016C10.7514 0.166016 9.55013 0.682237 8.66537 1.52219Z"
                                                                fill="white"></path>
                                                        </svg> 
                                                </a>
                                            @endif                                        
                                        </div>
                                        <h6>
                                            <a href="{{route('store.viewcourse',[$store->slug,\Illuminate\Support\Facades\Crypt::encrypt($course->id)])}}">{{$course->title}}</a>
                                        </h6>
                                        <div class="review-star d-flex align-items-center">
                                            @if($store->enable_rating == 'on')                                                
                                                @for($i =1;$i<=5;$i++)
                                                    @php
                                                        $icon = 'fa-star';
                                                        $color = '';
                                                        $newVal1 = ($i-0.5);
                                                        if($course->course_rating() < $i && $course->course_rating() >= $newVal1)
                                                        {
                                                            $icon = 'fa-star-half-alt';
                                                        }
                                                        if($course->course_rating() >= $newVal1)
                                                        {
                                                            $color = 'text-warning';
                                                        }
                                                    @endphp
                                                    <i class="fas {{$icon .' '. $color}}"></i>
                                                @endfor                                                
                                            @endif
                                        </div>
                                        <div class="course-bottom">
                                            <div class="course-detail">
                                                <p><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none">
                                                        <g clip-path="url(#clip0_19_26)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.89035 0.981725C3.17939 0.981725 0.981725 3.17939 0.981725 5.89035C0.981725 7.16364 1.46654 8.3237 2.26163 9.196C2.67034 8.3076 3.38394 7.61471 4.24934 7.22454C3.75002 6.77528 3.43604 6.12405 3.43604 5.39949C3.43604 4.04401 4.53487 2.94518 5.89035 2.94518C7.24583 2.94518 8.34466 4.04401 8.34466 5.39949C8.34466 6.11254 8.04058 6.75457 7.55502 7.20298C8.43552 7.56901 9.18412 8.23342 9.54281 9.16977C10.3238 8.30051 10.799 7.15092 10.799 5.89035C10.799 3.17939 8.60131 0.981725 5.89035 0.981725ZM9.69387 10.3882C10.9703 9.30774 11.7807 7.69368 11.7807 5.89035C11.7807 2.6372 9.1435 0 5.89035 0C2.6372 0 0 2.6372 0 5.89035C0 7.69366 0.810351 9.30769 2.08677 10.3882C2.12022 10.426 2.15982 10.459 2.20478 10.4855C3.21384 11.2959 4.49547 11.7807 5.89035 11.7807C7.28519 11.7807 8.5668 11.2959 9.57584 10.4856C9.62075 10.4591 9.66038 10.4261 9.69387 10.3882ZM8.74856 9.88145L8.66025 9.61652C8.29993 8.53556 7.14229 7.8538 5.89035 7.8538C4.6233 7.8538 3.49161 8.64647 3.0586 9.83723L3.04038 9.88735C3.84386 10.4613 4.82767 10.799 5.89035 10.799C6.95667 10.799 7.94357 10.459 8.74856 9.88145ZM5.89035 6.87208C6.70364 6.87208 7.36294 6.21278 7.36294 5.39949C7.36294 4.5862 6.70364 3.9269 5.89035 3.9269C5.07706 3.9269 4.41776 4.5862 4.41776 5.39949C4.41776 6.21278 5.07706 6.87208 5.89035 6.87208Z"
                                                                fill="#8A94A6" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_19_26">
                                                                <rect width="11.7807" height="11.7807" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>{{$course->student_count->count()}} <span>{{__('Students')}}</span>
                                                </p>
                                                <p><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none">
                                                        <g clip-path="url(#clip0_19_28)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M5.45116 0.161627C5.72754 0.0234357 6.05285 0.0234355 6.32924 0.161627L11.122 2.558C11.8456 2.91979 11.8456 3.95237 11.122 4.31416L10.4238 4.66324L11.122 5.01231C11.8456 5.3741 11.8456 6.40669 11.122 6.76848L10.4238 7.11755L11.122 7.46663C11.8456 7.82842 11.8456 8.861 11.122 9.22279L6.32924 11.6192C6.05286 11.7574 5.72754 11.7574 5.45116 11.6192L0.658407 9.22279C-0.0651723 8.861 -0.0651715 7.82842 0.658406 7.46663L1.35656 7.11755L0.658407 6.76848C-0.0651723 6.40669 -0.0651715 5.3741 0.658406 5.01231L1.35656 4.66324L0.658407 4.31416C-0.0651731 3.95237 -0.0651713 2.91979 0.658407 2.558L5.45116 0.161627ZM2.67882 4.22677C2.67563 4.22513 2.67243 4.22353 2.66921 4.22197L1.09745 3.43608L5.8902 1.03971L10.6829 3.43608L9.1111 4.22201C9.10793 4.22355 9.10479 4.22512 9.10166 4.22673L5.8902 5.83246L2.67882 4.22677ZM2.45416 5.21204L1.09745 5.8904L2.66915 6.67625L2.67888 6.68111L5.8902 8.28677L9.10163 6.68105L9.11112 6.67631L10.6829 5.8904L9.32623 5.21204L6.32924 6.71054C6.05286 6.84873 5.72754 6.84873 5.45116 6.71054L2.45416 5.21204ZM1.09745 8.34471L2.45416 7.66635L5.45116 9.16485C5.72754 9.30304 6.05286 9.30304 6.32924 9.16485L9.32623 7.66635L10.6829 8.34471L5.8902 10.7411L1.09745 8.34471Z"
                                                                fill="#8A94A6" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_19_28">
                                                                <rect width="11.7807" height="11.7807" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg> {{$course->chapter_count->count()}}<span>{{__('Chapters')}}</span>
                                                </p>
                                                <p> {{$course->level}}</p>
                                            </div>
                                        </div>
                                        @php
                                            $cart = session()->get($slug);
                                            $key = false;
                                        @endphp
                                        @if(!empty($cart['products']))
                                            @foreach($cart['products'] as $k => $value)
                                                @if($course->id == $value['product_id'])
                                                    @php
                                                        $key = $k
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <div class="price-addtocart d-flex align-items-center justify-content-between">
                                          
                                            @if(Auth::guard('students')->check())
                                                @if(in_array($course->id,Auth::guard('students')->user()->purchasedCourse()))
                                                    <div class="price">
                                                    </div>
                                                    <div class="btn add-cart">
                                                        <a href="{{route('store.fullscreen',[$store->slug,Crypt::encrypt($course->id),''])}}">
                                                            {{__('Start Watching')}}
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="price">
                                                        @if($course->has_discount == 'on')
                                                            <ins> {{ ($course->is_free == 'on')? __('Free') : Utility::priceFormat($course->price)}}</ins>
                                                            <sub>
                                                                <del> {{ Utility::priceFormat($course->discount)}} </del>
                                                            </sub>
                                                        @else
                                                            <ins> {{ ($course->is_free == 'on')? __('Free') : Utility::priceFormat($course->price)}}</ins>
                                                            <sub>
                                                                <del> {{ Utility::priceFormat($course->discount)}} </del>
                                                            </sub>
                                                        @endif
                                                    </div>
                                                    <div class="add-cart">
                                                        @if($key !== false)
                                                            <a id="cart-btn-{{$course->id}}" class="btn">{{__('Already in Cart')}}</a>
                                                        @else
                                                            <a id="cart-btn-{{$course->id}}" class="btn add-cart" data-id="{{$course->id}}">{{__('Add in Cart')}}</a>
                                                        @endif
                                                    </div>
                                                @endif
                                            @else
                                                <div class="price">
                                                    @if($course->has_discount == 'on')
                                                        <ins>{{ ($course->is_free == 'on')? __('Free') : Utility::priceFormat($course->price)}}</ins>
                                                        <sub>
                                                            <del> {{ Utility::priceFormat($course->discount)}} </del>
                                                        </sub>
                                                    @else
                                                        <h3>{{ ($course->is_free == 'on')? __('Free') : Utility::priceFormat($course->price)}}</h3>
                                                        <sub>
                                                            <del> {{ Utility::priceFormat($course->discount)}} </del>
                                                        </sub>
                                                    @endif
                                                </div>
                                                <div class="add-cart">
                                                    @if($key !== false)
                                                        <a id="cart-btn-{{$course->id}}" class="btn">{{__('Already in Cart')}}</a>
                                                    @else
                                                        <a id="cart-btn-{{$course->id}}" class="btn add_to_cart" data-id="{{$course->id}}">{{__('Add in Cart')}}</a>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif  -->  

    <!-- EMAIL SUBSCRIBER 
    @if($store->enable_subscriber == 'on')
        <section class="newsletter-section padding-bottom" id="newsletter">
            <div class="container">
                <div class="newsletter-content-wrap">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="newsletter-left">
                                <div class="section-title">
                                    <h2><b>{{ $store->subscriber_title }}</b></h2>
                                </div>
                                <p>{{ $store->sub_title }}</p>
                                <div class="newsletter-form">
                                    {{Form::open(array('route' => array('subscriptions.store_email', $store->id),'method' => 'POST'))}}
                                        <div class="input-wrapper">
                                            {{-- <input type="email" name="email" id=""  placeholder="Type your email address"> --}}
                                            {{Form::email('email',null,array('aria-label'=>'Enter your email address','placeholder'=>__('Enter Your Email Address')))}}
                                                <button type="submit" class="btn btn-secondary ">{{__('SUBSCRIBE')}}</button>
                                        </div>
                                        <p>{{__('We will never spam to you. Only useful info')}}</p>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 newsletter-right-side">
                            <div class="newsletter-image">
                                {{-- <img src="assets/images/MaleRunning-newsletter.png" alt=""> --}}
                                @if(!empty($store->sub_img))
                                    <img src="{{asset(Storage::url('uploads/store_logo/'.$store->sub_img))}}" alt="newsletter">
                                @else
                                    <img src="{{asset('assets/'.$store->theme_dir.'/img/newsletter.png')}}" alt="newsletter">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif-->
   
@endsection
