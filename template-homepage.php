<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 
    //get_header(); 

                $home = get_page_by_title( 'Home' );
                $images = get_attached_media('image', $home->ID);
                $index = 0;
                foreach($images as $image) { 
                    $index++;
                   $image_attributes = wp_get_attachment_image_src($image->ID,'full');
                   ?>
                    img class="bgimgs" src="echo $image_attributes[0]?>" />
             }
*/
    $cur_lang = pll_current_language(); 
    if($cur_lang == 'fr') {
        $Made_France = "100% Fabrication à Paris";    
        $Visit_Showroom_W17 = "Collection Hiver 2017";
        $about_title="About";
        $about_txt="Atelier Bourgeons fait une création des vêtements avec des tissus de fins de séries, des chutes, des tissus d’occasion ainsi une vente de vêtements vintages et de seconde main. Des pièces originaux sont 100% fabriqués en région parisienne à la façon artisanale  à partir de conception à la conféction. Une nouvelle façon de mode ; s’habiller éthique et durable avec plein l’amour vous attend maintenant. Nous vous souhaitons une agréable visite !";
        $concept_title = "Concept";        
        $concept_txt = "Quand je trouve des bourgeons dans la rue,  j'ai le souffle coupé. Parce que je ressens tellement d’énergie dans ces petites formes qui continuent à grandir discretement mais sans arrêt jusqu’ils fleurissent. leurs charmes mignons et délicats, mais aissi courageux et vaillant m’attire chaque fois. Pour créer quelque shose,il y a forcément des processus. Et dans ces processus, il y a toujour plein d’histoires avec des gens, des matières, des  lieux qui concerne jusqu’à la fin de fabrication. En pensant à ces histoires, shoisir ce qu’on utilise pour créer des nouvelles pièces avec soin,  Et après, des gens qui les portent relie des histoires comme ajouter la valeur des choses. Je voudrais être un morceau d’une série de processus adorable, pour passer un petit bonheur à quelqu’un. Comme si je vous passe des bourgeons et vous les faire fleurir";
        $original_title = "Des vêtements originaux";
        $original_txt = array (1 => 'Fournitures & chute de tissus', 'Creation & Fabrication', 'Carte, Griffe, Emballage');
        $tissus_txt="Dans ce monde d’excès de consommation,  beaucoup de matières charmantes sont jetées ou abbandonées dans des entrepôts. Pour les mettre la valeur  à nouveau, nous utilisons des tissus qui ont quitté la scène, fin de série, tissu d’occasion, etc. Nous utilisons aussi des petits chutes dans les détails de vêtements comme s’amuser avec des puzzles. Profiter maximum des matières, jeter moin, et voila des vêtements uniques  sont fait ! Des boutons et des ruban vintages aide également pour ajouter une originalité  de pièces.";
        $creation_txt="‘‘La charme intemporelle avec une belle harmonie entre rétro et moderne’’- C’est un concept principal de style d’atelier. Nous essayons de créer des vêtements qui aident vous exprimer votre personnalité et ce que vous  ’’ aimez’’ sans se laisser influencer juste par la « tendance» qui change trop souvent. Créer la forme sur un mannequin avec une toile, relever la sur des papiers puis couper des  vrais tissus à la forme de patronnage. Après la répétition d’une couture et modification, voila une pièce est faite! Avec beaucoup de travail manuel comme la maison de couture, nous vous offront des pièces unique qui ont tant d’amour et tient dans le temps.";
        $packaging_txt="Nous  recyclons la toile qui ont été utilisées lors la création de patronnage pour fabriquer des étiquettes de compositions et de tailles. Les griffes sont fabriquées de coton organique en Italie. Produits d’ emballage sont tous fabriqué dans la matière recyclée, et ils sont recyclable (sauf le papier kraft imperméable et du ruban adhésif pour le livraison). Nous proposons des ruban et des cartes de message pour l’emballage cadeau. Voici les plus de détails.";
        $custom_title = "Vêtements sur mesures";
        $custom_cadre = "Exemple de relooking";
        $custom_txt = "atelier Bourgeons offre également des vêtements et des accessoires de seconde mains et de vintage qui vients de puce, magasins de recyclage, boutiques solidaires, entrepôts pour le pros, etc.Nous custamisons, retaillons, et faire la reprise  également des pièces selon les besoins. Pour les détails des informations, consultez-vous aux pages de chaques articles sur notre E-boutique.";
        $creator_title="Creator";
        $creator_txt="Mie MANABE, Née à Gifu (JAPON). Pendant  ses études à l’université départemental d’Aichi, elle s’intéresse à la mode éthique・ durable et commencé  à faire la rédaction pour un site spéciqlisé à la mode éthique. En même temps, elle apprend des conseils habillage et la décoration de mode puis fait des expériences  en tant qu’assistant styliste. Après être dîplomé, elle s’installe en France et apprend le modélisme chez AICP en alternance avec une marque prêt-à-porter femme . Dîplomé en tant que modéliste femme international qualifié par l’état à 2015. Elle commance à créer des vêtements avec des chutes, la fin de série, des tissus d’occasion qu’elle avait collectionné à 2016. Elle fait une rédaction irregulièrement pour  « Fragment magazine  (http://www.fragmentsmag.com/)»";
        $fipre_title = "Fripe";
        $vetement_sur_mesure_title="Vetement-sur-merure";        
        $vetement_sur_mesure_txt="Ce n’est pas facile de trouver un vêtement que vous aimez à votre taille,  surtout des tenues pour une journée spéciale comme mariage, anniversaire, fête etc…Alors  créeons donc une pièce  ensemble à votre gôut qui va parfaitement à votre taille !!Renseignez-vous d’abord par téléphone ou e-mail, des devis et des croquis sont gratuit pour vous !!";
        $vetement_sur_mesure_Step1_title="Step 1：";        
        $vetement_sur_mesure_Step1_txt="Indiquez-nous des  iformations de designs que vous désirez( catégorie d’article comme ‘’robe’’ ,‘’jupe’’ etc, des détails de design, matière de tissu, etc. Si vous aurez des images ou  découpage de magazine, ça nous aide beaucoup lors de création de croquis et un devis. N’hesitez pas à nous consulter également sur un buget ou la délais de remise d’article. Plus tard, nous vous enverons un croquis ainsi un devis dans les meilleurs délais.";
        $vetement_sur_mesure_Step2_title="Step 2：";
        $vetement_sur_mesure_Step2_txt_1="Modification/ determination de design & selection de tissu / prise de mesure";
        $vetement_sur_mesure_Step2_txt_2="Nous modifions des croquis autant que vous voulez gratuitement avant commencer la fabrication.Dans le cas qu’on a reçu votre demande finale avec un croquis définitif, Vous payerez 30% de devis et nous commançons à decider le tissu et prendre vos mesure ensemble.Pour le tissu, vous pourrez acheter vous même ou choisir dans le stock à l’atelier à prix intéressant. Si vous souhaitez, nous pouvons aller shoisir du tissu ensemble dans un magasin. Il est possible aussi que nous choisissons et achetons du tissu à votre place( dans ce cas là, Nous vous demanderons de payer le tissu.Donnez-nous à peu-près le prix de votre buget avant. Avant la fabrication, nous vous demandons de venir à l’atelier afin de prise de mesure.";
        $vetement_sur_mesure_Step2_txt_3="Imade de cette  pièce est une robe rétro 50’s comme Grqce kelly . Un haut décolleté en point sur le devant et le dos avec une jupe évasé mi-logue avec un jupon. Nous somme allées choisir le tissu ensemble  à Paris 18ème .";
        $vetement_sur_mesure_Step2_ex="Imade de cette  pièce est une robe rétro 50’s comme Grqce kelly . Un haut décolleté en point sur le devant et le dos avec une jupe évasé mi-logue avec un jupon. Nous somme allées choisir le tissu ensemble  à Paris 18ème .";
        $vetement_sur_mesure_Step3_title="Step 3：";
        $vetement_sur_mesure_Step3_txt_1="Création de la base de vêtement";
        $vetement_sur_mesure_Step3_txt_2="En ajustant un mannequin à votre taille, nous créeons la forme de vêtement avec de la toile. Nous pourrons vous contacter par fois pour verifier des détails.";
        $vetement_sur_mesure_Step4_title="Step 4：";
        $vetement_sur_mesure_Step4_title2="essayage/ modification";
        $vetement_sur_mesure_Step4_txt="Une fois que la base de vêtement  sera faite, vous  viendrez  l’essayer à l’atelier. Dans le cas ou il y a  une modification importante, vous viendrez une fois après lpour vérifier , et puis nous commanços la fabrication avec le vrai tissu. Nous respectrons au maximum pour la date d’essayage par rapport à votre disponibilité  et la date de remise  d’artjcle ou vous désirez.";
        $vetement_sur_mesure_Step5_title="Step 5:";
        $vetement_sur_mesure_Step5_title2="fini！！";
        $vetement_sur_mesure_Step5_txt="Après la fabrication, vous viendrez la dernière fois pour l’essayage finale. S’il n’y a pas de problème, vous payerez le rest de devis et le vêtement viendra chez vous!!!!";
        $retouche_title="Retouche";
        $retouche_txt="atelierBourgeons fait également la retouche de nos articles.Ourlets, reprise de la partie éffiloché, chagement de la doublure, etc. N’hesitez pas à nous consulter par téléphone ou e-mail.";
        $emballage_title="Emballage cadeau";
        $emballage_txt="Pour  emballage cadeaux, nous offerons un service de ruban et une petite carte .Si vous le souhaitez, veuillez mettre la page de commande de l’emballage cadeau  dans votre panier lors de la commande avec des articles que vous voulez emballer.";
    }else if ($cur_lang == 'en'){
        $Made_France = "100% Made in Paris";  
        $Visit_Showroom_W17 = "Visit Showroom";
        $concept_title = "Concept";
        $concept_txt = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu tellus eget sapien scelerisque viverra vel at nulla. Etiam quis lectus elementum, lacinia sapien congue, pellentesque libero. Morbi consectetur fringilla massa nec rhoncus. Sed congue, felis facilisis vulputate feugiat, diam lectus euismod nisl, id placerat odio lorem a erat. Nullam consectetur justo a ipsum semper, at malesuada ante fringilla. Donec vestibulum elementum gravida. Ut facilisis, libero id finibus suscipit, orci magna pulvinar metus, eget rutrum ipsum eros sit amet metus. Duis aliquet vel lacus nec mattis. Nunc commodo magna sit amet scelerisque aliquet. Pellentesque at congue sapien. Fusce at ultricies metus. Vestibulum rutrum nisi sit amet felis sodales ultricies. Nam a sem eu nisl accumsan iaculis. Cras feugiat et metus at condimentum.";
        $concept_plus = "discover";
        $original_title = "Orignial clothes";
        $original_txt = array (1 => 'Fabric & Accessoires', 'Creation & Fabrication', 'Fabrication artisanale & manuelle 100% Française');
        $custom_title = "Tailor maded";
        $custom_txt = "If you want a particular order, feel free to contact us : contact@atelierbourgeons.com";
        $fipre_title = "Fripe";
    } else {
        $about_txt="atelier Bourgeons (アトリエブルジョン)は、クチュールメゾンで役目を終えたデッドストック生地・工場で廃棄されるハギレ・中古布・ヴィンテージ素材などで創るオリジナル服と、主にヨーロッパでセレクトした古着＆中古服のお店です。オリジナル服は、型紙制作から縫製までをパリ郊外のアトリエで行い、ご紹介する作品のほぼ全てが一点ものです。時の流れとともに生まれた、その布・素材だけの味や個性をお楽しみください。このアトリエを通じて、どうかあなたがお気に入りの一着と出会えますように。";
        $concept_txt="― Bourgeons ぶるじょん【仏】：蕾 つぼみ  ―\n普段歩く道すがら、今にも咲きそうな蕾を見るといつもハッとする。\n花になるまでの間、人知れずせっせと成長し続けるその小さなフォルムは\n繊細でちょっとお茶目。でも実は健気で相当たくましい\nそういうところを全部ひっくるめて、なんだかとても愛おしくなるから。\n何かができるまでには、必ず過程があって、その中には関わる色んな人・モノの感情やストーリーが詰まっている。\nその全てに想いを馳せながら、大事にものを選んで、創って今度はそれを着る人が、新しいストーリーを繋げていく。\nそういう愛おしい“過程の連続”の一片になりたい\n            私が渡す蕾を、あなたが花にして育てていくように。";
        $tissus_txt="モノが溢れている今の世の中には、まだ使えても倉庫に埋もれていたり、捨てられていく魅力的な素材が沢山あります。\nそんな彼らの良さをもっと伝えたくて、服の素材には一度表舞台から降りてしまったものを選んで使用しています。小さな布切れも、パズルのピースをはめ込むようにさりげなく服の中へ取り入れて、遊び心をプラス。
            \n
            アクセントにあしらうフランスらしいヴィンテージボタンやリボンも、ちょっとしたこだわりです。";
        $creation_txt="レトロな雰囲気と新しさが微妙にマッチしたときの、独特な面白さ。次々と入れ替わる「トレンド」だけに縛られず、あなたの“好き”や個性を素直に表せるような服創りを目指して。
            \n
            仮縫い用布をトルソーに沿わせながら形を作り、型紙(パターン)に起こしたら生地を裁断。その後縫いと修正を繰り返し、一枚の服が完成します。
            \n
            クチュールメゾンのように多くの工程を手作業で行い、細やかさと温もりのある服を皆さまへ。";
        $packaging_txt="洗濯表示のラベル&サイズタグは、使用済みの仮縫い用布(シーチング)を再利用して作っています。
            \n
            ブランドネームタグは、オーガニックコットン100％のイタリア製です。
            \n
            包装類はすべてエコ・再利用資源から出来ており、使用後もリサイクル可能です（防水加工済みの配達用クラフト紙および粘着テープを除く）。
            \n
            ギフト用にリボンとメッセージカードをお付けできます。詳しくはこちら";
        $vintage_txt="atelier Bourgeonsでは、主にヨーロッパの蚤の市、リサイクルショップ、業者用の倉庫から仕入れる古着・中古服・小物
            も取り扱っています。より着やすく可愛い服を楽しんでいただけるよう、必要に応じてリサイズ・リメイクも行っています。各商品の詳細については、E-shopの商品紹介ページをご覧ください。";
        $creator_txt="Mie MANABE
            \n
            岐阜県生まれ。愛知県立大学仏語学科在学中、サステイナブルなものづくりに興味をもち、某サイトにてインタビューやブランド紹介記事の寄稿を開始。週末はバンタンキャリアスクールにてスタイリングを勉強し、その後アシスタントとして実践的なノウハウを学ぶ。
            大学卒業後、渡仏。デザイナーズブランドで働きながら服飾学校でパターンカッティングを学び、
            仏政府公認のレディースパタンナー資格を取得。
            \n
            2016年、以前か集めていたデッドストック生地や布切れを使った服創りを開始。
            Fragments magazine (http://www.fragmentsmag.com/)にて執筆活動も行う(不定期)。";
        $made_order_1="自分が本当に気に入るデザインで、サイズがピッタリな服を見つけるのはなかなか難しいもの。
            ちょっと特別な日に着るあなただけの一着を、一緒に創ってみませんか？
            デザインのご相談とお見積りは無料です、どうぞお気軽にお問合せください。";
        $made_order_step1_title="Step 1：デザインとお見積りのお問合せ・ご相談";
        $made_order_step1_txt="アトリエにお越しの際、またはメールにてご希望のイメージをお伝えください。
           （トップス、ワンピースなどのアイテム名、デザインのポイント、素材など。雑誌の切り抜き・イラスト等の参考資料や具体的なご要望があれば、より詳細なデザイン画・お見積り作成が可能です。）
            予算や納期についても、お気軽にご相談ください。
            \n
            後日、デザイン画とお見積りをメールにてお送りいたします。";
        $made_order_step2_title="Step2 :  デザインの修正・決定後、生地選びと採寸";
        $made_order_step2_txt="デザイン画は何度でも無料で修正いたします。
            \n
            最終的に決定した内容でご依頼を承った場合、前金としてお見積り金額の30％をお支払い頂き、
            生地選びと採寸に進みます。
            \n
            生地は、ご自身が事前に購入されたものをお持ち頂いても、アトリエのストック生地から選んで購入していただいても結構です。ご希望に応じて、一緒にお店へ足を運んだり、こちらが代理で購入することも可能です(生地代はご負担いただきます、予め大体の予算をお伝えください)。
            制作に入る前に、採寸のため一度アトリエにお越し頂きます。";
        $made_order_step2_ex_title="ex:　親族の結婚式に着ていくミニドレスをご注文されたお客様の場合。";
        $made_order_step2_ex_txt="イメージは、Grace Kelly が着ているような50年代のレトロ風ワンピース。デコルテと背中は深くあけて、スカートは裾が大きく広がる膝丈のAライン。生地はパリ18区の生地屋街で一緒に選びながら購入しました。";
        $made_order_step3_title="Step 3：トワル制作";
        $made_order_step3_txt="採寸したサイズにわせてトルソーを調節し、まずは仮縫い用の生地で服の原型(トワル)の製作に入ります。
        制作途中、デザイン等の確認でご連絡をさせて頂くことがございます。";
        $made_order_step4_title="Step 4：試着・修正";
        $made_order_step4_txt="出来上がったトワルを、アトリエにて試着して頂きます。
        ここでデザイン・サイズ等の大きな修正がある場合、本縫い前に二度目の試着をして頂き、
        問題なければいよいよ本縫いへ。
        アトリエにお越し頂くお日にちは、納期やご都合に合わせて柔軟に対応いたします。";
        $made_order_step5_title="Step 5：完成！！";
        $made_order_step5_txt="完成後、最終チェックの試着をして頂きます。問題なければ、残額のご精算いただき、
        服があなたの元へお嫁に参ります。";
        $made_order_step6_title="atelierBourgeonsでは、商品のお直しも行っております。裾直し、ほつれ修理、裏地の交換など、
        メールまたはお電話にてお気軽にお問い合わせください。";
        $made_order_gift="プレゼント用に、リボンとメッセージカードをお付けできます(別料金)。ご希望の方は、E-shopで商品をご注文の際に
        ギフトラッピング注文ページをカートに入れて頂きますようお願いたします。";

    }
    $siteurl = get_site_url();
    $about_img = array ( 1 => "/wp-content/themes/atelierbourgeons/img/about/mannequin.jpg" ,'/wp-content/themes/atelierbourgeons/img/about/ciseaux.jpg' ,'/wp-content/themes/atelierbourgeons/img/about/feuillebas.jpg','/wp-content/themes/atelierbourgeons/img/about/feuillehaut.jpg');
    //$original_img = array ( 1 => "/wp-content/themes/atelierbourgeons/img/square.jpg" ,'/wp-content/themes/atelierbourgeons/img/square.jpg' ,'/wp-content/themes/atelierbourgeons/img/square.jpg');
    $custom_img = array ( 1 => "/wp-content/themes/atelierbourgeons/img/custom.jpg" ,'/wp-content/themes/atelierbourgeons/img/custom.jpg' ,'/wp-content/themes/atelierbourgeons/img/custom.jpg');
    $separator_img = array ( 1 => "/wp-content/themes/atelierbourgeons/img/separator.png" );
    $original_img = array ( 1 => "/wp-content/themes/atelierbourgeons/img/original/Fabric.jpg","/wp-content/themes/atelierbourgeons/img/original/Carte.jpg","/wp-content/themes/atelierbourgeons/img/original/Creation.jpg");
    $vintage_img = array ( 1 => "/wp-content/themes/atelierbourgeons/img/vintage/frip_all.png", "/wp-content/themes/atelierbourgeons/img/vintage/frip_ensemble.png", "/wp-content/themes/atelierbourgeons/img/vintage/robe_all.png", "/wp-content/themes/atelierbourgeons/img/vintage/cadre.png" );
    $made_to_order_img = array ( 1 => "/wp-content/themes/atelierbourgeons/img/made-to-order/fleche.png", "/wp-content/themes/atelierbourgeons/img/made-to-order/recherche.jpg", "/wp-content/themes/atelierbourgeons/img/made-to-order/illustration.jpg", "/wp-content/themes/atelierbourgeons/img/made-to-order/illustration.jpg", "/wp-content/themes/atelierbourgeons/img/made-to-order/mannequin.jpg", "/wp-content/themes/atelierbourgeons/img/made-to-order/devant.jpg", "/wp-content/themes/atelierbourgeons/img/made-to-order/dos.jpg", "/wp-content/themes/atelierbourgeons/img/made-to-order/fini.jpg", "/wp-content/themes/atelierbourgeons/img/made-to-order/direction.png");
?>

<html <?php language_attributes();  ?> ><?php /*storefront_html_tag_schema();*/ ?>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
</head>
    <svg viewBox="70 -100 100 400" enable-background="new 0 0 500 300" width="500px" version="1.1" id="Logo_Top" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="612px" xml:space="preserve" style="position: absolute; width: 50%; display: block; z-index: 2000; height: 50%; top: 25%; left: 25%;">
    <g>
        <path stroke="#000000" stroke-width="0.5" stroke-miterlimit="10" d="M161.928,111.956c-4.484,3.959-9.58,7.938-15.336,11.918   C152.573,119.942,157.647,115.962,161.928,111.956z"></path>
	<path stroke="#000000" stroke-width="0.5" stroke-miterlimit="10" d="M145.075,126.78c-2.43,1.77-7.25-0.516-11.109-2.906   C137.473,126.188,142.904,129.135,145.075,126.78z"></path>
	<path stroke="#000000" stroke-width="0.5" stroke-miterlimit="10" d="M117.949,110.561c3.481-0.99,9.826-4.26,13.566-9.222   c14.994-19.883-4.957-59.961-43.637-35.624c-0.381-0.296-0.567,0.133-5.089-3.395c-4.521-3.527-13.426-4.579-13.426-4.579   s-2.972,0.03-2.851,0.568c8.392,38.414,5.977,109.354-11.903,134.104c1.809-0.754,16.646-8.809,23.35-18.191   c14.595-23.186,20.995-97.567,12.945-106.157c-0.047-0.05,6.258-5.318,13.638-4.929c18.126,0.954,23.072,24.712,14.569,37.105   c-0.43,0.531-4.268,6.445-5.618,7.687c-1.355,1.239-4.118,3.754-4.526,4.006c-0.637,0.797-0.487,1.635,0.457,2.518   c1.589-0.188,7.632-1.271,13.774,0.445c8.672,3.703,13.012,12.059,12.416,12.889c-0.602,0.83-18.942,12.271-35.323,23.836   c-8.932,6.305-15.569,25.485-1.048,31.985C157.883,205.098,170.94,111.589,117.949,110.561z M111.432,174.984   c-27.859-0.552-16.03-18.133-10.598-22.2c15.953-11.938,35.579-22.188,36.06-22.477c0.516,1.213,0.932,2.463,1.129,3.782   c0.326,1.263,0.565,2.496,0.834,3.681C143.563,158.399,123.938,175.232,111.432,174.984z"></path>
    </g>
    <path d="M164.488,89.524l-26.873-43.073l-0.529,0.299c0,0,22.154,36.692,24.729,44.653c-3.094,2.95-1.346,5.845,1.732,9.905  c3.842,5.076,7.45,10.66,10.521,10.356C177.518,111.325,176.917,96.614,164.488,89.524z M166.193,102.436  c-0.756-0.826-5.994-7.891-3.486-9.792c2.818-2.14,8.271,5.773,8.955,6.661c2.646,3.438,3.849,8.805,1.5,10.498  C172.059,110.597,169.059,105.569,166.193,102.436z"></path>
    <path stroke="#000000" stroke-width="0.5" stroke-miterlimit="10" d="M211.42,121.917c-4.164-1.264-1.494-8.68-7.308-8.733  c-4.486-0.043-12.238,8.653-14.024,13.438c-4.541,12.277-2.117,21.224,4.096,29.766c1.164,1.595,0.402,8.937-7.426,18.563  c0.784-2.654,1.239-5.781,0.637-8.506c-1.861-8.44-3.592-16.969-14.199-28.961c-1.188-1.346-5.27,7.338-6.026,12.994  c1.924,17.258,12.829,14.572,15.879,29.191c-40.456,55.313-166.675,42.945-170.563-57.387  c3.374-175.48,233.561-88.984,149.443-10.324C273.474,13.526,5.075-72.669,5.075,118.733  c-3.477,88.852,113.993,132.941,170.627,71.722c6.537-7.184,21.586-27.727,23.752-30.803c11.744-7.25,13.769-9.512,16.563-17.705  C222.29,123.575,220.454,124.645,211.42,121.917z M185.952,175.994c-0.51,0.66-1.024,1.32-1.555,1.996  c-3.408-10.156-15.924-15.621-15.242-27.454c0.142-2.432,3.14-7.553,4.183-10.68C180.69,144.069,189.391,167.346,185.952,175.994z   M202.497,116.171c0.414-0.17,5.968,4.064,7.588,7.076c-5.002,0.267-10.403,4.281-13.377,6.791  c-1.239-1.063-2.446-2.182-3.588-3.391C194.585,122.104,197.172,118.358,202.497,116.171z M199.107,155.553  c0.051-0.209-1.449-0.371-2.057-0.703c-12.984-7.028-5.806-23.987-5.32-26.372c5.52,4.934,14.258,12.059,16.91,22.854  C208.906,152.417,203.805,156.368,199.107,155.553z M210.118,146.864c-0.045-0.441-7.442-12.887-12.297-16.016  c3.31-3.414,5.988-5.072,12.797-6.578C213.879,132.024,214.357,139.487,210.118,146.864z"></path>
    </svg>

    
    <svg version="1.1" id="Logo_Bottom" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="792px" height="612px" viewBox="0 0 792 612" enable-background="new 0 0 792 612" xml:space="preserve" style="position: absolute; width: 50%; display: block; z-index: 2000; height: 50%; top: 70%; left: 28%;">
             <path xmlns="http://www.w3.org/2000/svg" d="M51.784,91.232c-0.36,0.476-0.93,0.822-1.211,1.421c-2.574,5.473-24.436,6.668-27.839,0.563    c-0.393-0.701-1.188,0.996-1.68,1.564c-0.498,0.563-1.103,0.991-1.815,1.274c-0.182,0.287-0.564,0.59-1.146,0.922    s-6.174,4.451-8.812,0.926c-0.646-0.868-0.806-2.036-0.806-3.264c0-16.711,15.693-14.813,16.146-13.768    c0.171,0.096,0.44,0.141,0.799,0.141c0.633,0,1.214-0.234,1.748-0.709c0.54-0.477,1.031-0.711,1.479-0.711    c0.452,0,0.86,0.383,1.216,1.139c-0.268,0.756-0.626,1.396-1.078,1.914c-0.446,0.519-0.67,1.301-0.67,2.34    c0,0.757,5.772,15.197,21.518,6.035c0.761-0.444,1.521-0.83,2.152-1.492c0.363,0,0.537,0.144,0.537,0.425    C52.322,90.329,52.148,90.758,51.784,91.232z M17.351,82.433c-0.356,0-5.575,9.443-2.554,12.631    c0.062,0.064,0.188,0.007,0.268,0.068c2.665,2.076,5.881-6.406,6.058-6.736C22.388,85.993,17.805,82.433,17.351,82.433z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M105.102,82.577c-0.399,0.188-0.688,0.516-0.868,0.996c-1.524,0.942-3.029,1.911-4.51,2.903    c-1.48,0.998-3.024,1.875-4.644,2.629c-0.354,0-0.711,0.281-1.068,0.849c-0.633,0.192-1.191,0.475-1.683,0.854    c-0.496,0.375-1.012,0.705-1.55,0.992c-1.968,1.135-3.988,2.244-6.051,3.332c-2.064,1.09-4.146,2.088-6.252,2.984    c-2.109,0.897-4.284,1.631-6.525,2.196c-2.238,0.57-4.484,0.854-6.724,0.854c-4.345,0-10.146-2.068-12.907-5.965    c-0.19-0.273-2.167-7.162-2.023-11.351c0.018-0.567-0.144-5.875,0.68-6.248c-0.232,0.107-2.696-0.221-2.696-0.987    c0-1.132,1.588-1.908,2.825-2.275c0.901-0.262,0.673-3.734,0.673-4.109c0-0.475-0.234-4.438,1.479-5.819    c0.2-0.164,0.384-0.287,0.605-0.287c0.229,0,0.431-0.047,0.609-0.142c0.177-0.094,0.353-0.211,0.528-0.352    c0.183-0.145,0.408-0.213,0.679-0.213c0.451,0,2.639,1.943,1.884,3.973c-0.269,0.726-1.075,5.349-1.075,6.104v0.992    c1.968,0.192,3.878,0.252,5.714,0.424c4.279,0.414,14.082,0.248,17.418-0.424l5.786-0.853c0.355,0,0.534,0.142,0.534,0.424    c0,0.281-0.358,0.57-1.077,0.853c-7.477,2.975-24.971,2.834-26.628,2.834h-1.883c-0.176,0.385-0.227,1.184-0.469,2.35    c-0.646,3.084,0.883,8.381,1.004,9.152c0.507,3.19,4.194,6.668,6.125,7.236c1.922,0.567,3.923,0.942,5.981,0.854    c6.721-0.295,13.807-3.551,16.679-4.971c2.869-1.42,5.623-2.937,8.272-4.541c2.641-1.609,5.042-3.123,7.192-4.543    c0.534,0,1.012-0.236,1.41-0.709c0.403-0.476,0.919-0.707,1.551-0.707h0.401c0.18-0.381,0.355-0.572,0.532-0.572    c0.186,0.094,0.316,0.141,0.408,0.141c0.091,0.101,0.226,0.142,0.405,0.142C105.754,82.058,105.51,82.386,105.102,82.577z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M120.634,93.217c-2.239,0.949-4.482,2.063-6.729,3.336c-2.235,1.279-4.582,1.939-6.988,2.346    c-3.581,0.603-11.864-0.116-15.2-2.627c-2.016-1.516-1.524-6.221-1.615-6.317c0.309-1.457,1.602-5.904,2.964-7.806    c0.968-1.348,4.673-5.813,9.282-5.813c0.067,0,0.143,0,0.217,0.002c0.635,0.021,1.205,0.139,1.73,0.35    c0.579,0.234,2.084,3.617,2.084,4.187c0,0.664-0.401,1.44-1.213,2.338c-0.802,0.904-1.747,1.775-2.818,2.627    c-1.075,0.855-2.159,1.613-3.229,2.271c-1.081,0.663-1.883,1.045-2.426,1.139c-0.177,0.186-0.265,0.424-0.265,0.705    c0,0.854,2.325,3.836,3.229,4.399c0.888,0.564,1.784,1.127,2.751,1.42c5.715,1.707,14.509-1.971,15.265-2.696    c0.812-0.771,4.142-3.181,5.789-2.695C124.259,90.616,121.079,92.652,120.634,93.217z M99.918,80.446    c-0.711,0.381-1.345,1.043-1.883,1.987c-0.534,0.945-0.802,3.404-0.802,3.404s2.663-2.029,3.153-2.406    C100.887,83.05,100.099,80.544,99.918,80.446z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M160.374,93.217c-1.299,0.949-8.316,5.178-14.126,6.389c-7.199,1.504-18.285,2.238-22.592-4.112    c-0.306-0.449-2.53-4.59-2.892-5.25c0.18-0.384-0.835-7.949,0-12.351c1.042-5.487-0.003-13.864,1.348-19.018    c0,0-0.245-6.306,2.353-7.521c0.729-0.342,1.098-0.994,1.816-0.994c0.179,0.289,1.479,1.47,1.479,1.847    c0,0.381-0.32,4.24-0.67,6.104c-1.506,7.916-2.104,21.566-1.078,27.392c0.063,0.371-0.083,8.432,9.751,10.993    c3.504,0.916,19.716-1.598,22.462-4.254c0.613-0.594,3.454-2.721,4.035-3.19c0.582-0.476,1.544-0.617,1.544-0.428    C163.804,88.821,161.679,92.271,160.374,93.217z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M287.452,81.87c1.479-20.783,4.104-34.035,4.236-35.979c0.32-4.735-0.945-6.033-0.945-6.033    c0-1.133-0.398-6.381-0.667-7.518l1.612-2.555c0.447-0.283,2.418-1.416,2.961-1.416c0.979,0,1.591,0.444,1.812,1.348    c0.227,0.896,0.336,1.771,0.336,2.623c0,0,0.63-0.33,0.538-0.424c0.628-0.854,1.48-4.826,2.021-5.676    c0-0.759,3.735-9.896,6.586-13.06c4.605-5.111,16.455-9.287,19.906-1.277c3.946,9.148,2.737,22.699-0.791,32.935    c-1.298,3.766-6.07,12.051-6.07,12.051c0,0.281-1.566,3.031-1.745,3.121c0.537-0.09,2.557-0.428,3.093-0.422    c4.369,0.031,13.99,4.674,14.604,5.361c10.057,11.293,12.402,24.096,5.434,35.936c-0.955,1.625-2.141,3.104-3.494,4.469    c-6.477,6.529-19.098,6.439-25.014,4.472c-1.354-0.449-2.712-1.043-4.106-1.703c-1.385-0.66-2.642-1.535-3.764-2.627    c-1.119-1.086-1.822-2.533-1.679-4.326c0.513-6.4,1.891-10.601,5.276-13.459c0.396-0.338,2.895,0.473,1.72,4.233    c-0.038,0.132-2.479,9.728,5.975,11.822c0.675,0.17,12.065,4.939,18.594-1.235c12.783-12.091,4.117-28.449-5.272-35.064    c-7.527-5.305-18.804,1.201-19.973,1.201c-0.446,0-1.574,0.617-2.418-0.277c-0.862-0.916,0.044-1.137,0.136-1.424    c0.088-0.287,0.398-0.615,0.938-0.992c0.718-0.471,1.435-1.088,2.153-1.848c0.714-0.754,2.823-2.219,3.093-2.695    c0.266-0.469,2.831-3.082,3.898-5.393c4.522-9.791,6.988-19.996,7.14-24.041c0.168-4.529,0.101-11.605-2.928-16.271    c-2.715-4.174-6.309-3.182-9.88-0.354c-2.099,1.662-4.411,7.479-4.411,7.764c-1.166,2.461-5.615,12.09-6.326,14.736    c-0.18,0.662-1.527,7.188-1.886,9.084c-0.361,1.891-0.629,3.832-0.809,5.817l0.729,14.115c0.088,1.326-1.175,30.209-1.266,30.867    c0,0,0.141,14.232-1.615,17.887c-3.504,7.312-7.82-5.682-7.935-6.248C285.745,101.81,285.895,96.519,287.452,81.87     M294.241,69.804c0,0-0.27-2.035-0.27-2.412v0.709c0,0-0.648,1.918-0.604,2.06c0.044,0.139-0.739,6.315-0.739,6.315    c0,0.427-0.684,7.814-1.074,11.205c-0.47,4.058,1.284,18.103,1.611,20.439v0.141C293.254,107.508,294.42,70.751,294.241,69.804z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M182.962,91.943c-1.475,0.945-2.979,1.847-4.501,2.697c-2.333,1.322-4.729,2.506-7.197,3.545    c-2.462,1.045-8.94,1.869-9.208,1.918c-0.271,0.045-5.387-1.006-8.747-3.901c-3.318-2.865-3.605-12.439-3.563-13.769    c0.047-1.324,0.11-2.646,0.069-3.971c-0.072-2.127,6.092-3.453,6.453-3.551c0.357,0.098-0.405,6.575-0.405,8.66    c0,3.5,1.442,6.258,2.829,9.223c3.923,8.373,22.368-2.178,23.534-2.842c0.623-0.377,3.63-2.271,3.63-2.271    C186.222,87.681,184.449,90.999,182.962,91.943z M152.102,60.724c-0.201-0.787,3.049-2.604,3.763-2.699    c0.18,0.189,1.037,0.214,1.213,0.072c0.181-0.141,0.358-0.213,0.535-0.213c0.449,0,3.239,2.373,2.559,3.973    c-0.035,0.086,0.048,0.144,0.136,0.144C160.306,62.472,153.265,65.277,152.102,60.724z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M243.544,82.294c-2.332,0.945-4.75,1.609-7.264,1.984c-2.509,0.381-4.995,0.637-7.394,1.139    c-3.469,0.725-9.191-0.283-9.819-0.283c-0.177,0.189,0.7,3.785,0.741,4.254c0.047,0.473,0.342,7.367-1.553,9.363    c-0.546,0.576-2.775,1.854-3.495,1.854c-0.98,0-1.851-1.012-2.149-3.694c-0.053-0.472,0.815-1.816,0.67-3.974    c-0.276-4.114-1.205-8.967-1.205-9.575c0-0.617-0.224-1.164-0.678-1.632c0.091-0.291,1.773-3.246,4.711-4.26    c0.358-0.125,1.792,3.357,1.88,3.828c0.358-0.283,0.788-0.518,1.279-0.705c0.499-0.188,1.635-0.711,2.084-0.711    c1.081,0,1.497,1.916,3.093,1.988c6.451,0.299,27.752-3.836,28.113-4.123c0.445,0,1.252,0.201,1.071,0.717    C253.07,80.075,244.532,81.919,243.544,82.294z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M383.004,84.277c-0.355,0-1.525,0.191-1.884,0.287c-0.088,0.095-3.629-0.287-3.629-0.287    c-0.536-0.188-2.334,1.134-2.02,1.703c0.918,1.662-0.402,5.941-1.479,7.308c-1.079,1.375-1.629,2.936-2.559,4.053    c-3.752,4.512-9.863,2.836-10.488,2.836c-0.896-0.852-1.325-2.104-2.084-3.338c-2.182-3.563,0.201-8.535,0.201-9.574v-0.428    c0-0.283,1.723-6.041,6.857-8.441c0.553-0.26,1.102-0.481,1.657-0.647c2.55-0.74,5.65,1.377,6.279,1.565l1.613,0.568    c0.178,0.188,1.166,0.563,2.957,1.133c1.795,0.564,3.856,0.855,6.188,0.855s4.57-0.312,6.724-0.925    c2.147-0.616,4.66-1.493,7.53-2.625c0.182,0.097,0.34,0.119,0.475,0.074c0.133-0.049,0.543-0.047,0.471,0.207    C398.728,82.267,383.18,84.277,383.004,84.277z M367.674,82.148c-0.898-0.028-1.551,0.285-1.949,0.851    c-0.408,0.574-2.09,7.67-2.09,7.67c-0.715,4.342,1.842,5.104,2.826,5.104h0.135c0.18-0.28,0.463-0.674,0.879-1.133    c3.578-3.965,2.977-9.653,2.883-9.936C370.268,84.136,371.053,82.267,367.674,82.148z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M438.271,99.183c-9.504,0.121-15.309-4.615-15.803-5.043c-0.49-0.422-5.295-6.291-5.576-6.313    c-0.549-0.047-3.631,7.612-7.535,10.356c-1.598,1.125-3.541,1.849-6.053,1.849c-2.873,0-5.021-1.183-6.457-3.55    c-1.437-2.364-2.801-7.448-2.016-11.778c0.239-1.308,0.225-2.412,0.399-3.269c-0.268-0.375-1.022-2.895,1.078-4.108    c1.027-0.599,2.39-1.845,2.957-0.992c2.004,2.983,1.076,6.287,1.076,7.235c0,1.134-1.063,12.39,4.576,12.063    c3.35-0.193,7.063-5.842,7.799-9.797c0.258-1.4,0.502-4.41,1.346-5.533c0.592-0.779,4.098-2.699,5.717-1.42    c2.641,2.088,3.137,6.557,5.248,8.869c2.105,2.32,4.564,5.77,11.701,7.026c1.662,0.296,3.385,1.072,5.447,0.992    c6.318-0.246,10.977-2.696,11.426-2.696c0.631,0,0.943,0.237,0.943,0.713C454.187,94.45,446.111,99.079,438.271,99.183z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M507.666,143.741c-0.416,4.602-4.75,22.377-18.898,31.647c-1.625,1.063-3.916,0.992-6.252,0.992    c-1.527,0-11.547-1.457-16.207-6.959c-4.191-4.943-4.645-10.039-4.77-10.922c-1.996-14.56,2.859-22.859,5.646-25.047    c1.48-1.166-6.211,17.35-2.15,26.039c3.441,7.364,4.629,10.379,9.412,11.563c33.896,8.4,29.65-56.399,28.381-62.229    c-1.074-4.931-4.631-16.297-9.148-18.306c-0.928-0.41-6.186,5.681-6.186,5.681c-2.553,1.838-6.014,1.356-6.928,0.563    c-2.346-2.049-0.607-7.57-0.336-8.369c0.238-0.694,1.826-5.521,5.578-8.301c0.949-0.703,1.906-1.305,2.895-1.774    c0.986-0.478,3.307-0.712,4.305-0.287c1.758,0.741,0.568,2.871,0.537,3.836c-0.014,0.299,1.125,0.278,1.213,0.278    c0.629-0.467,1.387-0.711,2.285-0.711c0.357,0,0.723,0.191,1.074,0.574c0.18,0.375,0.828,3.383,0.873,3.898    c0.045,0.52,6.707,18.651,8.072,25.83C509.019,122.038,509.019,128.741,507.666,143.741z M487.627,82.294    c0,0-3.398,3.051-3.229,9.08c0.02,0.694,0.381,1.258,0.607,1.772c0.223,0.523,0.736,0.808,1.549,0.783    c2.479-0.08,4.162-5.76,4.301-6.248C492.183,83.017,487.627,82.294,487.627,82.294z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M626.949,97.341c0,0.469-1.389,1.086-1.748,1.27c-0.359,0.193-7.662,1.847-9.014,1.847c-1.072,0-2.34,0.026-3.76-0.211    c-6-0.992-11.438-4.92-12.51-6.957c-1.078-2.033-1.885-3.806-2.426-5.318c-0.445,1.514-3.986,6.055-4.438,7.377    c0,0-1.277,1.736-4.172,2.84c-3.008,1.154-4.316,0.945-5.244-1.42c-1.4-3.576-3.225-13.053-3.225-14.754    c0-1.231,0.668-2.205,2.018-2.912c1.344-0.705,2.512-1.065,3.496-1.065c0.357,0,0.629,0.146,0.809,0.43    c0,0.85,0.953,5.32,0.807,8.654c-0.012,0.188,0.604,4.61,0.736,5.037c0.135,0.426,1.998,0.073,2.621-1.064    c0.629-1.137,1.258-2.412,1.891-3.826c0.621-1.426,2.426-6.25,4.438-6.531c0.797-0.112,1.545-0.329,2.217-0.991    c0.674-0.662,2.873-0.814,3.027-0.289c1.207,4.104,0.064,9.795,2.424,11.78c1.039,0.88,4.928,4.214,6.18,4.685    c1.26,0.475,12.127,1.352,12.982,1.205C624.91,96.978,626.949,96.859,626.949,97.341z"/>
             <path xmlns="http://www.w3.org/2000/svg" d="M639.787,98.469c-2.855,1.887-10.121,1.789-15.264-0.424c-0.6-0.256-0.811-1.562-0.811-1.562    c0.092,0,0.158-0.021,0.205-0.071c0.043-0.047,0.107-0.068,0.203-0.068c0.445,0,10.02,1.326,10.223,1.273    c2.988-0.779,0.873-3.002,0.738-3.332c-0.137-0.332-8.135-3.123-8.408-8.447v-0.139c0,0,0.266-2.445,0.268-3.267    c0.008-3.229,5.666-6.125,10.359-5.252c0.98,0.187,2.844,0.387,3.424,0.785c1.988,1.359-0.465,3.33-0.465,3.33    c-0.092,0.191-1.076,0.91-2.088,0.072c-0.244-0.203-1.143-1.343-1.41-1.629c-0.271-0.289-0.762-0.478-1.48-0.568    c-0.447,0.092-2.486,1.365-2.961,3.262c-1.313,5.271,6.861,5.105,9.082,10.287C641.427,92.786,643.17,96.234,639.787,98.469z"/>             
             <path xmlns="http://www.w3.org/2000/svg" d="M211.366,94.536c-2.241,0.944-4.484,2.063-6.729,3.336c-2.235,1.274-4.587,1.938-6.994,2.344    c-3.578,0.604-11.862-0.117-15.195-2.625c-2.021-1.516-1.526-6.223-1.615-6.318c0.308-1.459,1.598-5.907,2.961-7.807    c0.972-1.346,4.674-5.814,9.279-5.814c0.074,0,0.148,0,0.221,0.007c0.635,0.021,1.204,0.137,1.729,0.344    c0.581,0.24,2.089,3.623,2.089,4.19c0,0.664-0.405,1.441-1.215,2.339c-0.806,0.897-1.748,1.771-2.823,2.627    c-1.072,0.852-2.156,1.608-3.226,2.271c-1.078,0.664-1.887,1.045-2.43,1.135c-0.174,0.188-0.262,0.427-0.262,0.709    c0,0.855,2.326,3.834,3.229,4.4c0.893,0.564,1.789,1.127,2.754,1.42c5.715,1.705,14.506-1.977,15.264-2.699    c0.812-0.77,4.138-3.18,5.789-2.692C214.986,91.933,211.813,93.967,211.366,94.536z M190.65,81.763    c-0.712,0.377-1.346,1.039-1.881,1.988c-0.537,0.945-0.809,3.404-0.809,3.404s2.666-2.029,3.159-2.41    C191.616,84.366,190.83,81.859,190.65,81.763z"/>
             
             <path xmlns="http://www.w3.org/2000/svg" d="M480.041,82.304c-2.332,0.941-4.754,1.605-7.268,1.984c-2.508,0.377-4.994,0.633-7.396,1.135    c-3.461,0.725-9.189-0.281-9.818-0.281c-0.178,0.188,0.699,3.783,0.74,4.254c0.047,0.476,0.348,7.369-1.549,9.365    c-0.545,0.578-2.773,1.851-3.498,1.851c-0.979,0-1.848-1.013-2.146-3.693c-0.053-0.467,0.814-1.814,0.668-3.971    c-0.273-4.115-1.207-8.968-1.207-9.58c0-0.613-0.223-1.16-0.678-1.629c0.092-0.289,1.777-3.244,4.715-4.261    c0.355-0.125,1.791,3.355,1.883,3.828c0.355-0.281,0.785-0.516,1.273-0.707c0.498-0.188,1.637-0.707,2.084-0.707    c1.08,0,1.5,1.912,3.092,1.986c6.455,0.299,27.752-3.834,28.113-4.119c0.449,0,1.256,0.197,1.076,0.715    C489.562,80.089,481.021,81.926,480.041,82.304z"/>
             
             <path xmlns="http://www.w3.org/2000/svg" d="M566.638,84.06c-0.359,0-1.525,0.189-1.881,0.281c-0.092,0.096-3.633-0.281-3.633-0.281    c-0.539-0.19-2.332,1.133-2.018,1.703c0.918,1.66-0.406,5.938-1.479,7.305c-1.078,1.378-1.633,2.937-2.557,4.048    c-3.756,4.52-9.865,2.838-10.49,2.838c-0.9-0.849-1.33-2.103-2.084-3.336c-2.184-3.56,0.201-8.533,0.201-9.578v-0.426    c0-0.279,1.723-6.037,6.855-8.441c0.555-0.258,1.988-0.742,2.154-0.783c1.963-0.547,8.563,2.84,10.354,3.406    c1.797,0.566,3.855,0.854,6.188,0.854s4.574-0.309,6.727-0.922c2.15-0.617,4.662-1.494,7.535-2.625    c0.178,0.099,0.336,0.119,0.471,0.07c0.127-0.047,0.541-0.045,0.467,0.209C582.363,82.051,566.816,84.06,566.638,84.06z     M551.304,81.929c-0.898-0.031-1.543,0.283-1.945,0.848c-0.408,0.57-2.088,7.669-2.088,7.669    c-0.713,4.344,1.975,5.635,2.826,5.106c4.088-2.52,3.988-10.787,3.895-11.068C553.904,83.917,554.687,82.051,551.304,81.929z"/>             
             <path xmlns="http://www.w3.org/2000/svg" d="M537.91,94.327c-2.242,0.946-4.486,2.063-6.732,3.336c-2.236,1.274-4.584,1.938-6.988,2.342    c-3.58,0.604-11.859-0.117-15.201-2.627c-2.018-1.516-1.52-6.221-1.609-6.314c0.309-1.459,1.596-5.907,2.963-7.805    c0.965-1.348,4.672-5.816,9.279-5.816c0.07,0,0.145,0,0.221,0.007c0.629,0.021,1.201,0.137,1.729,0.346    c0.582,0.238,2.084,3.621,2.084,4.188c0,0.662-0.406,1.443-1.211,2.339c-0.807,0.901-1.75,1.774-2.822,2.627    c-1.078,0.854-2.156,1.61-3.229,2.271c-1.078,0.662-1.883,1.043-2.426,1.139c-0.176,0.187-0.27,0.421-0.27,0.707    c0,0.854,2.33,3.834,3.23,4.398c0.895,0.566,1.787,1.129,2.758,1.418c5.711,1.709,14.506-1.971,15.264-2.693    c0.807-0.774,4.141-3.182,5.783-2.696C541.529,91.72,538.353,93.761,537.91,94.327z M517.195,81.554    c-0.717,0.379-1.348,1.039-1.883,1.984c-0.535,0.944-0.805,3.405-0.805,3.405s2.666-2.03,3.156-2.411    C518.16,84.155,517.375,81.648,517.195,81.554z"/>
    </svg> 
    <div class="overlay-loader show" id="loader" style="position: fixed; top: 0px; right: 0px; bottom: 0px; left: 0px; width: 100%;">
        <div style="position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; background-color: rgb(255, 255, 255); display: block;" class="loader-background"></div>
    </div>

    <?php get_header();//wp_head(); ?>
    <body style="height:100%;width:100%;overflow:hidden;">
    <section id="home">
        
        <div id="bgimgs" class="board">
            
            <img class="bgimgs" src ="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/homepage.jpg" /> 
            <img class="bgimgs portrait" src ="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/homepage-portrait.jpg" /> 
            <div id="social-media">
            <li id="facebook" class="socialicon socialicon-f">
                <i class="fa fa-facebook fa-lg"></i>
            </li>
            <li id="twitter" class="socialicon socialicon-t">
                <i class="fa fa-twitter fa-lg" ></i>
            </li>
            <li id="instagram" class="socialicon socialicon-i">
                <i class="fa fa-instagram fa-lg" ></i>
            </li>            
            </div>
            <!--<li class="fa-shopping-cart">
            </li>-->            
        </div>
    </section>
    <section id="galerie17w">
        <canvas id="slider" width="300" height="200" style="border:1px solid #000000; display:none;">
</canvas> 
        <div class="galerietitre"><div> Hiver 2017</div></div>
        <div id='galerie17w-txt' class='title_showroom' >
                <?php echo $Visit_Showroom_W17; ?>
        </div>  
        
    <div class="galerie am-container" id="am-container">
        

<?php 
$gal17w = get_page_by_title( 'Galerie17W' );
$images = get_attached_media('image', $gal17w->ID);
$index = 0;
foreach($images as $image) { 
    $index++;
   $image_attributes = wp_get_attachment_image_src($image->ID,'full');
   ?>
    <a href="<?php echo $image_attributes[0]?>" data-lightbox="roadtrip" class="am-wrapper" data-title="Optional caption."><img src="<?php echo $image_attributes[0]?>" />
    
					<div class="overlay" style="opacity: 0.9; display:none;"></div>
				 
				</a>
<?php } ?>
</div>
       <!-- <div class="galerieopen">    <img id='about-close' src ="<?php //echo get_site_url(); ?>/wp-content/themes/atelierbourgeons/img/down-chevron.png" /></div> -->
        <script src="<?php echo get_site_url(); ?>/wp-content/themes/atelierbourgeons/js/pixi.min.js"></script>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/atelierbourgeons/js/hammer.min.js"></script>
<script src="<?php echo get_site_url(); ?>/wp-content/themes/atelierbourgeons/js/pixi-carousel.js"></script>

            </section>
    <section id="about">
        <img id="about-mannequin" src ="<?php echo get_site_url(); echo $about_img[1];?>"/>
        <img id="about-ciseaux" src ="<?php echo get_site_url(); echo $about_img[2];?>"/>
        <img id="about-feuillebas" src ="<?php echo get_site_url(); echo $about_img[3];?>"/>
        <img id="about-feuillehaut" src ="<?php echo get_site_url(); echo $about_img[4];?>"/>
        <div id="about-page">
        <div class='title'>
            <?php echo $about_title;?>
        </div> 
    <!--<div class='board-left'>
        <img id='about-img' accesskey=""src ="<?php //echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/concept.jpg" />
    </div>       -->
        
        <div id='about-txt' class=''>
          <?php echo $about_txt;
                /*$post = get_page_by_title( 'About' );                
                global $polylang;
                $post_ids = $polylang->model->get_translations('page', $post->ID);                
                // j'affiche le contenu de la page About dans la langue courrante 
                echo get_post($post_ids[pll_current_language()])->post_content;
                * 
                */
                ?>
        </div>            
        
            
        </div>    
        </section>
        <section id="concept">
            <img id="separator" class="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" /><img class="separator" id="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" />
    <div id="concept-page">
        <div class='title'>
            <?php echo $concept_title;?>
        </div> 
    <!--<div class='board-left'>
        <img id='about-img' accesskey=""src ="<?php //echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/concept.jpg" />
    </div>       -->
        
        <div id='concept-txt' class=''>
          <?php echo $concept_txt;
                /*$post = get_page_by_title( 'About' );                
                global $polylang;
                $post_ids = $polylang->model->get_translations('page', $post->ID);                
                // j'affiche le contenu de la page About dans la langue courrante 
                echo get_post($post_ids[pll_current_language()])->post_content;
                * 
                */
                ?>
            </div>
        </div>
            <img id="separator" class="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" /><img class="separator" id="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" />
        </section>
        <section id="collections-original">
        <div id='original-clothes-title' class='title'>
                <?php echo $original_title; ?>
        </div>
             
        <div id='original-clothes' class=''>            
            <div class="original-clothes-vign">
                <div class="original-clothes-tile">
                    <img class="original-clothes-img" accesskey=""src ="<?php echo get_site_url(); echo $original_img[1];?>" />        
                    <div class="original-clothes-txt title">
                        <?php echo $original_txt[1]; ?>
                    </div>
                </div>
                <div><?php echo $tissus_txt; ?></div>
            </div>
            <div class="original-clothes-vign">
                <div class="original-clothes-tile">
                    <img class="original-clothes-img" accesskey=""src ="<?php echo get_site_url(); echo $original_img[2];?>" />        
                    <div class="original-clothes-txt title">
                        <?php echo $original_txt[2]; ?>
                    </div>
                </div>
                <div><?php echo $creation_txt; ?></div>
            </div>
            <div class="original-clothes-vign">
                <div class="original-clothes-tile">
                    <img class="original-clothes-img" accesskey="" src ="<?php echo get_site_url(); echo $original_img[3];?>" />        
                    <div class="original-clothes-txt title">
                        <?php echo $original_txt[3]; ?>
                    </div>
                </div>
                <div><?php echo $packaging_txt; ?></div>
            </div>
        </div>
        <img id="separator" class="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" /><img class="separator" id="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" />
        </section>
        <section id="custom">
        
            <div id='custom-clothes-title' class='title'>
                    <?php echo $custom_title; ?>
            </div>                
            <div id='custom-clothes' class=''>            
                <div class="custom-clothes-vign">
                    <img class="original-clothes-img" accesskey=""src ="<?php echo get_site_url(); echo $vintage_img[2];?>" />                        
                </div>
                <div class="custom-clothes-vign">
                    <img class="original-clothes-img" accesskey=""src ="<?php echo get_site_url(); echo $vintage_img[1];?>" />  
                </div>
                <div class="custom-clothes-vign">
                    <img class="original-clothes-img" accesskey=""src ="<?php echo get_site_url(); echo $vintage_img[3];?>" /> 
                </div>
                <div id="vintage-clothes-cadre">
                    <div><?php echo $custom_cadre; ?> </div>
                    <img accesskey=""src ="<?php echo get_site_url(); echo $vintage_img[4];?>" /> 
                </div>
            </div>   
            <div id='custom-txt' class=''>
                    <?php echo $custom_txt; ?>
            </div>
            <div id='' class='title'>
                    <?php echo $fipre_title; ?>
            </div>
        </section>
        <section id="creator">
            <img id="separator" class="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" /><img class="separator" id="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" />
            <div id='creator-title' class='title'>
                <?php echo $creator_title; ?>
            </div>        
            <div id='creator-txt' class='txt'>
                <?php echo $creator_txt; ?>
            </div>
            <img id="separator" class="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" /><img class="separator" id="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" />
        </section>
        <section id="vetement-sur-mesure">
            <img id="separator" class="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" /><img class="separator" id="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" />
            <div id='creator-title' class='title'>
                <?php echo $vetement_sur_mesure_title; ?>
            </div>        
            <div id='creator-txt' class='txt'>
                <?php echo $vetement_sur_mesure_txt; ?>
            </div>
            
            
            <div id="made_to_order_step1">
                <img accesskey=""src ="<?php echo get_site_url(); echo $made_to_order_img[2];?>" /> 
                <div><b><?php echo $vetement_sur_mesure_Step1_title; ?></b>                    
                    <?php echo $vetement_sur_mesure_Step1_txt; ?>
                </div>
            </div>
            
            <div id="made_to_order_step2">
                <img accesskey="" src ="<?php echo get_site_url(); echo $made_to_order_img[3];?>" /> 
                <div id="made_to_order_step2_description">
                    <b><?php echo $vetement_sur_mesure_Step2_title; ?></b>
                    <?php echo $vetement_sur_mesure_Step2_txt; ?>
                    <?php echo $vetement_sur_mesure_Step2_txt_2; ?>
                </div>
                
                    
                <div id="made_to_order_step2_subtitle">
                    <?php echo $vetement_sur_mesure_Step2_txt_3; ?>
                    <img accesskey=""src ="<?php echo get_site_url(); echo $made_to_order_img[9];?>" />   
                </div>
                
            </div>
            
            <div id="made_to_order_step3">
                <img accesskey=""src ="<?php echo get_site_url(); echo $made_to_order_img[5];?>" /> 
                <div>
                    <b><?php echo $vetement_sur_mesure_Step3_title; ?></b><a><?php echo $vetement_sur_mesure_Step3_txt_1; ?></a>
                            <li><?php echo $vetement_sur_mesure_Step3_txt_2; ?></li>
                </div>
            </div>
            
            <div id="made_to_order_step4">
                <img accesskey=""src ="<?php echo get_site_url(); echo $made_to_order_img[7];?>" />                 
                <div>
                    <b><?php echo $vetement_sur_mesure_Step4_title; ?></b><a><?php echo $vetement_sur_mesure_Step4_title2; ?></a>
                    <li><?php echo $vetement_sur_mesure_Step4_txt; ?></li>
                </div>
            </div>
            
            <div id="made_to_order_step5">
                <img accesskey=""src ="<?php echo get_site_url(); echo $made_to_order_img[8];?>" /> 
                <div>
                    <b><?php echo $vetement_sur_mesure_Step5_title; ?></b><a><?php echo $vetement_sur_mesure_Step5_title2; ?></a>
                    <li><?php echo $vetement_sur_mesure_Step5_txt; ?></li>
                </div>                
            </div>
 
            <img id="separator" class="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" /><img class="separator" id="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" />            
        </section>
        <section id="made_paris">
                <div id='made_paris-txt' class='title_concept'>
                <?php echo $Made_France; ?>
                </div>    
                <div id="" class="board">
                <img id='made_paris-img' class="bgimgs" accesskey=""src ="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/paris.jpg" />        
                <img id='made_paris-img' class="bgimgs portrait" accesskey=""src ="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/paris-portrait.jpg" />        
                </div>                   
        </section>
        <section id="emballage_title">
            <img id="separator" class="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" /><img class="separator" id="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" />
            <div id='emballage-title' class='title'>
                <?php echo $emballage_title; ?>
            </div>        
            <div id='emballage-txt' class='txt'>
                <?php echo $emballage_txt; ?>
            </div>
            <img id="separator" class="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" /><img class="separator" id="separator" src ="<?php echo get_site_url(); echo $separator_img[1]?>" />
        </section>
        <section id="vetement-sur-mesure">
        </section>
        <section id="retouche_premiere">
            <div id='retouche-title' class='title'>
                <?php echo $retouche_title; ?>
            </div>        
            <div id='retouche-txt' class='txt'>
                <?php echo $retouche_txt; ?>
            </div>
        </section>
        <section id="matiere_premiere">
            <div class="board">
                <img id='matiere_premiere-img' class="bgimgs" accesskey=""src ="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/organic-cotton-landscape.jpg" />        
                <img id='matiere_premiere-img' class="bgimgs portrait" accesskey=""src ="<?php echo get_site_url();?>/wp-content/themes/atelierbourgeons/img/organic-cotton-portrait.jpg" />        
            </div>
        </section>
        <section id="about_page">
            
        </section>
        


<?php 

//wp_footer(); 
get_footer();
?>
</body>
</html>
	
