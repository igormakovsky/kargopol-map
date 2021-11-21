<?php   
$id = 'kargopol';
$title = 'Каргополь — фамильные истории';
require dirname(__FILE__).'/vars.php';
require $docroot . 'includes/header.php';
?>

<body class='unselectable' onselectstart="return false;">
	<a class='switch historic' href='/interactive.php'>
		<img src="img/switch-historic.svg">
	</a>
	<div id='preload'></div>
	<div id='map' class='unselectable' onselectstart="return false;" hidden></div>
	<script>
		const mapUrl = 'img/kargopol-map-opt.webp';

		preload(mapUrl, function () {
			initmap();
			document.querySelector('#preload').setAttribute('hidden', 'hidden');
			document.querySelector('#map').removeAttribute('hidden');
		});

		function preload(url, callback) {
			var img = new Image();
			img.src = url;
			img.onload = callback;
		}

		function initmap() {
			const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
			const height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

			var LeafIcon = L.Icon.extend({
				options: {
					iconSize: [50, 50],
				}
			});
			var popupOpt = {
				// autoPanPadding: L.point(20, 70),
				closeButton: false,
				autoPan: false,
			};

			var map = L.map('map', {
				crs: L.CRS.Simple,
				minZoom: -2,
				maxZoom: 0,
				zoomDelta: 0,
				zoomSnap: 0
			});

			var bounds = [
				[0, 0],
				[3420, 6956]
			];
			var image = L.imageOverlay(mapUrl, bounds).addTo(map);

			map.fitBounds(bounds);
			if (width < 800) {
				map.setView([2330, 2650], -1);
			} else {
				map.setView([2230, 1350], -1);
			}

			var icon1 = new LeafIcon({
					iconUrl: 'img/pins/kargopol-pin-fish-light-1.png'
				}),
				icon2 = new LeafIcon({
					iconUrl: 'img/pins/kargopol-pin-church-dark.png'
				});

			var data = [
				// Houses
				{
					x: 2010,
					y: 3050,
					icon: icon1,
					content: "<h4>Дом Мокеева</h4><p><b>Болотникова, 8 и Октябрьский, 43</b></p><p><img src='img/house/1-mokeeva-0.jpg'/></p><p><img src='img/house/1-mokeeva-1.jpg'/></p>"
				},
				{
					x: 1300,
					y: 5740,
					icon: icon1,
					content: "<h4>Дом Отто</h4><p><b>Ленина, 83</b></p><p><img src='img/house/2-otto-0.jpg'/></p><p><img src='img/house/2-otto-1.jpg'/></p>"
				},
				{
					x: 1440,
					y: 4770,
					icon: icon1,
					content: "<h4>Дом А.М. Фадеева</h4><p><b>Акулова, 24</b></p><p><img src='img/house/3-fadeev-0.jpg'/></p>"
				},
				{
					x: 2250,
					y: 5480,
					icon: icon1,
					content: "<h4>Дом Пакулевых</h4><p><b>ул. Победы, 42 / ул. Больничная, 42</b></p>  <p>Построен в во второй пол. XIX в., имеет важное градостроительное значение и является объектом культурного наследия. Одноэтажный деревянный жилой дом расположен на углу квартала при пересечении двух улиц (Больничная/Победы).<br><br>Декоративное оформление фасадов выполнено в духе эклектики, тяготеющей к формам позднего классицизма. Планировка, образованная бревенчатыми стенами, состоит из четырех жилых комнат, кухни, двух прихожих и одной проходной комнаты, расположенной в центре здания. В нач. XX в. дом принадлежал служащему казначейства Михаилу Александровичу Пакулеву.<br><br>В 1935 году Прибытков Александр Иванович купил дом у вдовы Пакулева по договору, в соответствии с которым семья Пакулевых (вдова, сын и дочь) могли проживать в доме. К 1945 г. вдова и дочь скончались, а сын переехал жить в Плесецк. Прибытковы воспитали 5 детей (3 сына и 2 дочери). Сейчас в доме проживает семья одного из сыновей Александра Ивановича – Виталия Александровича. Исторический облик дома (как внешний, так и внутренний) прекрасно сохранился до наших дней, благодаря заботливым рукам семьи Прибытковых – старинные печи, половицы, сохранились сундуки и старое зеркало, помнящее мещанина Пакулева. Семья Прибытковых бережно хранит семейные реликвии и традиции, помогают и поддерживают друг друга.<br><br>Дом – победитель смотра-конкурса по сохранению облика исторической части города Каргополя «Хранители истории» в 2019 и 2021 г.г.</p>  <p><img src='img/house/4-pakulev-0.jpg'/></p><p><img src='img/house/4-pakulev-1.jpg'/></p>"
				},
				{
					x: 850,
					y: 6830,
					icon: icon1,
					content: "<h4>Усадьба Зуевых</h4><p><b>ул. Ленина, 95</b></p><p><img src='img/house/5-zuev-1.jpg'/></p><p><img src='img/house/5-zuev-0.jpg'/></p>"
				},
				{
					x: 1830,
					y: 3200,
					icon: icon1,
					content: "<h4>Дом Д.И. Блохина</h4><p><b>пр. Октябрьский, 50</b></p>  <p>Одноэтажный кирпичный дом Дмитрия Ивановича Блохина, расположенный на пересечении улицы Гагарина (быв. улицы Шелковня) и проспекта Октябрьского (быв. улицы Благовещенской), построен в 1850-е годы.<br><br>По имеющимся историческим сведениям каменный дом был сооружен на месте существовавшего ранее деревянного одноэтажного дома. Владельцы дома были: Тризна, Ильинские, Казанская, Блохин.<br><br>В Каргополе Блохины имели несколько домов и мастерскую. Занимались красильным промыслом. Вход в дом был с колоннами и со стороны Соборной площади, далее сразу открывался вид на залу, из которой шли три двери в жилые помещения. Пять комнат объединялись круговым обходом, из них три комнаты с окнами на площадь образовывали анфиладу. Из интерьера в доме сейчас сохранились три печи с чугунными дверцами и поддувалами, а также осталась комнатная дверь нач. XX в. с филенками. После 1920 года в доме располагалась типография.<br><br>Затем с 1965 по 1990 год в здании работала сберкасса. С 1991 по 1992 – касса «Трансагентства». В настоящее время здание находится в оперативном управлении Каргопольского музея.</p><p><img src='img/house/6-blohina-0.jpg'/></p><p><img src='img/house/6-blohina-1.jpg'/></p><p><img src='img/house/6-blohina-2.jpg'/></p>"
				},
				{
					x: 1910,
					y: 3300,
					icon: icon1,
					content: "<h4>Дом Д.И. Блохина</h4><p><b>пр. Октябрьский, д. 45</b></p>  <p>Блохин Дмитрий Иванович в Каргополь переехал будучи уже известным мастером-красильщиком. В 1865 году был избран в Каргопольский городовой магистрат. Блохин вошел в мещанское сословие и оставался в нем на протяжении всей жизни, не переходя в купечество. Он стал авторитетным человеком в городском обществе и в 1874 году вошел в первый состав городской думы, куда потом избирался еще неоднократно. Как депутат, работал в общественной комиссии при банке.<br><br>В 1878 г. Д.И. Блохин приобрел деревянный двухэтажный дом на углу улиц Благовещенской и Шелковни у крестьянина Якова Степановича Блохина. В 1894 году Д.И. Блохин все свое «благоприобретенное недвижимое имущество: каменный дом с двумя деревянными флигелями и двухэтажный деревянный дом со всею землею при них» завещал сыновьям Степану и Константину.<br><br>Двухэтажный деревянный дом с низким первым этажом и четырехскатной кровлей сейчас поделен на восемь квартир: пять на первом этаже (одна пустует) и три на втором. В доме два подъезда, один для жителей первого этажа, другой – для второго. В каждом свой ямный туалет, потому что нет водопровода и канализации. Зато у каждой квартиры есть во дворе небольшой участок с овощными грядками и даже парниками.<br><br>Дом – победитель смотра-конкурса по сохранению облика исторической части города Каргополя «Хранители истории» в 2019 и 2020 г.г.</p><p><img src='img/house/7-blohina-1.jpg'/></p><p><img src='img/house/7-blohina-0.jpg'/></p>"
				},
				{
					x: 1780,
					y: 3150,
					icon: icon1,
					content: "<h4>Дом Д.И. Блохина</h4><p><b>ул. Гагарина, 3</b></p><p><img src='img/house/8-blohina-0.jpg'/></p><p><img src='img/house/8-blohina-1.jpg'/></p>"
				},
				{
					x: 1630,
					y: 6556,
					icon: icon1,
					content: "<h4>Жилой дом Николаевских</h4><p><b>ул. Архангельская, 30 / ул. Советская, 63</b></p><p><img src='img/house/9-nikolaevskih-0.jpg'/></p>"
				},
				{
					x: 2920,
					y: 5150,
					icon: icon1,
					content: "<h4>Дом К.П. Шевелевой</h4><p><b>ул. Гагарина, 30</b></p><p><img src='img/house/10-sheveleva-0.jpg'/></p><p><img src='img/house/10-sheveleva-1.jpg'/></p>"
				},
				{
					x: 1390,
					y: 3970,
					icon: icon1,
					content: "<h4>Дом Вешнякова</h4><p><b>Победы, 12</b></p><p><img src='img/house/11-veshnyakova-0.jpg'/></p><p><img src='img/house/11-veshnyakova-1.jpg'/></p>"
				},
				{
					x: 2090,
					y: 2160,
					icon: icon1,
					content: "<h4>Дом мещанина Осыкина</h4><p><b>Сергеева, 1</b></p>  <p> В 1871 г. деревянный двухэтажный дом на Пятницкой улице (ныне угол улицы Сергеева и Набережной им. А.А.Баранова) принадлежал мещанской вдове Ульяне Васильевне Осыкиной. Мещанин Петр Дмитриевич Осыкин получил разрешение на строительство нового деревянного одноэтажного дома с мезонином взамен старого двухэтажного и построил его не ранее 1891 г. В 1907 г. П.Д. Осыкин содержит при этом доме бакалейную лавку. При советской власти в этом доме проживало от 4-7 семей.<br><br>В 2002 году семья Сергея и Елены Беляевых получила в безвозмездное пользование, заброшенный после пожара старый одноэтажный деревянный дом мещанина Осыкина. Они восстановили дом.<br><br>Гостеприимный «Дом на Пятницкой» принимал гостей, круглые столы, выставки, презентации, посиделки, собрания. Стал достопримечательностью и «душой» города. Дал «приют» парусному спорту и лагерю «Прибой». Заработал информационно-компьютерный центр «Axis», начали выпускать независимую общественную газету «Дом на Пятницкой». Позже открыли свой магазинчик канцтоваров.<br><br>С 2004 года в «Доме на Пятницкой» начали проходить соревнования по шашкам, где Сергей Беляев (чемпион области по русским шашкам) выступал не только как организатор, но и активный участник, судья, спонсор, а уже в 2008 году в доме прошел чемпионат Европы по русским шашкам среди женщин! В чемпионате принимали участие сильнейшие шашистки России, Украины, Белоруссии, Молдовы, стран Балтии, Польши, Венгрии и др. государств. К сожалению, в 2011 году Сергея Алексеевича Беляева не стало. Его супруга Елена Николаевна продолжает добрые традиции, начатые им, и «Дом на Пятницкой» всегда радует горожан своей ухоженностью.<br><br>Дом – победитель смотра-конкурса по сохранению облика исторической части города Каргополя «Хранители истории-2021»</p><p><img src='img/house/12-osykina-0.jpg'/></p><p><img src='img/house/12-osykina-2.jpg'/></p><p><img src='img/house/12-osykina-1.jpg'/></p>"
				},
				{
					x: 1470,
					y: 4130,
					icon: icon1,
					content: "<h4>Дом мещанина Сергеева</h4><p><b>пр. Октябрьский, 56</b></p><p><img src='img/house/13-sergeeva-0.jpg'/></p><p><img src='img/house/13-sergeeva-1.jpg'/></p>"
				},
				{
					x: 970,
					y: 5150,
					icon: icon1,
					content: "<h4>Дом Вешнякова</h4><p><b>пр. Октябрьский, 74</b></p><p><img src='img/house/14-veshnakov-0.jpg'/></p>"
				},
				{
					x: 1970,
					y: 4310,
					icon: icon1,
					content: "<h4>Дом купца Серкова</h4><p><b>ул. Ленинградская, 10</b></p>  <p> Дата постройки неизвестна. Дом построен купцами Серковыми. Купеческий род Серковых происходит из крестьян Красной Ляги. Тихон Никитич Серков и три его сына Василий, Григорий и Иван обосновались в Каргополе в 1870 г., где занялись торговлей, беличьим промыслом, вошли долей в винокуренное производство. В 1893 году братья объединили свои капиталы в товариществе «Торговый дом братьев Серковых».<br><br>Они построили несколько домов на Санкт-Петербургской (Ленинградской) улице. С 1901 г. здание являлось собственностью Константина Григорьевича, купца 2-й гильдии. Семья жила наверху, а в нижнем этаже его дома располагалась лавка. В ней продавались бакалейные, колониальные (чай, сахар, кофе), хлебные и винные товары. С приходом советской власти часть дома К.Г. Серкова занял земельный отдел. В ноябре 1924 г. дом был муниципализирован.<br><br>В настоящее время здание занимает почта.</p><p><img src='img/house/15-serkova-0.jpg'/></p><p><img src='img/house/15-serkova-1.jpg'/></p>"
				},
				{
					x: 2120,
					y: 4310,
					icon: icon1,
					content: "<h4>Дом Ушакова</h4><p><b>ул. Ленинградская, 11</b></p><p> Построен в нач. XX в. Александром Александровичем Ушаковым. Внизу были помещения под торговую лавку, вверху купец строил для себя квартиру, но перебраться в новый дом не успел: произошла революция. Хозяин скончался в 1919 г. Владелицей дома оставалась вдова Мария Митрофановна Ушакова. В это время в доме размещается клуб коммунистов. Дом был муниципализирован в 1924 г.<br><br>Двухэтажное кирпичное оштукатуренное здание представляет собой характерный пример провинциальной городской застройки кон. XIX – нач. XX в.в. Его архитектурный облик определен традициями классицизма, обусловившими структуру фасадов, и влиянием архитектуры модерна, к которой восходит завершение здания в виде двух усеченных пирамид. В интерьере сохранились потолочные и карнизные тяги, печи, филенчатые двери.<br><br>В советские годы в здании располагалась школа, общежитие педучилища. В настоящее время здание находится в ведении Каргопольского педагогического колледжа. </p><p><img src='img/house/16-ushakov-1.jpg'/></p><p><img src='img/house/16-ushakov-0.jpg'/></p><p><img src='img/house/16-ushakov-2.jpg'/></p>"
				},
				{
					x: 2500,
					y: 1850,
					icon: icon1,
					content: "<h4>Дом Вагера</h4><p><b>пр. Октябрьский, 31</b></p><p>Построен в нач. XX в. Владельцем дома был лесопромышленник Андреас Вагер из Норвегии. Компании «Бакке и Вагер» было дано право на вырубку леса в Каргопольском уезде. В 1911 г. он женился на каргопольской девушке Соне Котцовой.<br><br>Одноэтажный деревянный жилой дом с крещатым мезонином и бельведером в народе получил прозвание «Китайский домик» из-за своих длинных свесов кровли и из-за необычной башенки бельведера с плоской шатровой крышей. Андреас Вагер спланировал этот открытый на все четыре стороны бельведер специально, чтобы наблюдать в бинокль сплав леса по реке Онеге.<br><br>Дом опустел в 1918 г., когда Вагеры переехали в Онегу. После 1920 года в здании располагалась школа II ступени. Затем с 1950 по 1995 год в доме находилось общежитие Каргопольского педучилища. </p><p><img src='img/house/17-vager-0.jpg'/></p><p><img src='img/house/17-vager-1.jpg'/></p>"
				},
				{
					x: 2200,
					y: 2560,
					icon: icon1,
					content: "<h4>Жилой дом на Октябрьской, 39</h4><p><b>пр. Октябрьский, 39</b></p><p><img src='img/house/18-live-1.jpg'/></p>"
				},
				{
					x: 1700,
					y: 3010,
					icon: icon1,
					content: "<h4>Дом Немчинова</h4><p><b>ул. Гагарина, 1</b></p><p><img src='img/house/19-nemchinov-0.jpg'/></p><p><img src='img/house/19-nemchinov-1.jpg'/></p>"
				},
				{
					x: 2350,
					y: 4870,
					icon: icon1,
					content: "<h4>Дом М.А. Красавина</h4><p><b>ул. Ленинградская, 20</b></p><p><img src='img/house/20-krasavin-0.jpg'/></p><p><img src='img/house/20-krasavin-1.jpg'/></p>"
				},
				{
					x: 1900,
					y: 3520,
					icon: icon1,
					content: "<h4>Дом А.П. Лёхова</h4><p><b>ул. пр. Октябрьский, 47 / ул. Гагарина, 2</b></p><p><img src='img/house/21-lehov-1.jpg'/></p><p><img src='img/house/21-lehov-0.jpg'/></p>"
				},
				{
					x: 1200,
					y: 4990,
					icon: icon1,
					content: "<h4>Дом Хромулина</h4><p><b>пр.Октябрьский, 71</b></p><p><img src='img/house/22-hromulin-0.jpg'/></p><p><img src='img/house/22-hromulin-1.jpg'/></p>"
				},
				{
					x: 1650,
					y: 4150,
					icon: icon1,
					content: "<h4>Дом Лаврентьева</h4><p><b>ул. Победы, 5</b></p><p><img src='img/house/23-lavrentiev-0.jpg'/></p><p><img src='img/house/23-lavrentiev-1.jpg'/></p>"
				},
				{
					x: 1230,
					y: 4190,
					icon: icon1,
					content: "<h4>Жилой дом на Акулова, 13</h4><p><b>ул. Калинина, 5 / ул. Акулова, 13</b></p><p><img src='img/house/24-live-0.jpg'/></p><p><img src='img/house/24-live-1.jpg'/></p>"
				},
				{
					x: 2280,
					y: 4130,
					icon: icon1,
					content: "<h4>Дом Озеровых</h4><p><b>ул. Гагарина, 12</b></p><p><img src='img/house/25-ozerov-0.jpg'/></p>"
				},
				{
					x: 2700,
					y: 1830,
					icon: icon1,
					content: "<h4>Марусин дом</h4><p><b>ул. Онежская, 6</b></p><p><img src='img/house/26-marusin-0.jpg'/></p><p><img src='img/house/26-marusin-1.jpg'/></p>"
				},
				{
					x: 1920,
					y: 4710,
					icon: icon1,
					content: "<h4>Дом Носова</h4><p><b>ул. Победы, 11</b></p><p><img src='img/house/27-nosov-1.jpg'/></p><p><img src='img/house/27-nosov-0.jpg'/></p>"
				},
				{
					x: 1250,
					y: 4890,
					icon: icon1,
					content: "<h4>Дом Урываевых</h4><p><b>пр. Октябрьский, 69</b></p><p><img src='img/house/28-uryvaev-0.jpg'/></p><p><img src='img/house/28-uryvaev-1.jpg'/></p>"
				},
				{
					x: 1820,
					y: 4710,
					icon: icon1,
					content: "<h4>Дом Колпакова</h4><p><b>ул. Победы, 30</b></p><p><img src='img/house/29-kolpakov-0.jpg'/></p>"
				},
				{
					x: 1440,
					y: 5170,
					icon: icon1,
					content: "<h4>Жилой дом на Ленина, 66</h4><p><b>ул. Ленина, 66</b></p><p><img src='img/house/30-lenina-1.jpg'/></p><p><img src='img/house/30-lenina-0.jpg'/></p>"
				},
				{
					x: 2460,
					y: 3780,
					icon: icon1,
					content: "<h4>Дом Турыгина</h4><p><b>ул. Болотникова, 22</b></p><p><img src='img/house/31-turygin-1.jpg'/></p><p><img src='img/house/31-turygin-0.jpg'/></p>"
				},



				// Churches

				{
					x: 3000,
					y: 100,
					icon: icon2,
					content: "<h4>Церковь преп. Зосимы и Савватия Соловецких чудотворцев</h4><p><b>улица Красная горка, 5 / проспект Октябрьский, 18</b></p><p>Построена в 1819 году<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/1-zosim-0.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/1-zosim-1.jpg'/></p>"
				},
				{
					x: 2400,
					y: 2180,
					icon: icon2,
					content: "<h4>Церковь Благовещения Пресвятой Богородицы</h4><p><b>Красноармейская площадь / пр. Октябрьский, 37</b></p><p>Построена в 1692 – 1723 годах<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/2-blagoveshensk-0.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/2-blagoveshensk-1.jpg'/></p>"
				},
				{
					x: 2400,
					y: 2390,
					icon: icon2,
					content: "<h4>Церковь свят. Николая Чудотворца</h4><p><b>Красноармейская площадь / пр. Октябрьский, 37а</b></p><p>Построена в 1733 – 1742 гг.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/3-nik_chudotvorets-0.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/3-nik_chudotvorets-1.jpg'/></p>"
				},
				{
					x: 2500,
					y: 2600,
					icon: icon2,
					content: "<h4>Церковь Рождества Пресвятой Богородицы</h4><p><b>Красноармейская площадь / ул. Ленина, 32</b></p><p>Построена в 1678 – 1682 годах<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/4-rozhdestva-0.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/4-rozhdestva-1.jpg'/></p>"
				},
				{
					x: 2500,
					y: 2700,
					icon: icon2,
					content: "<h4>Церковь Владимирской иконы Божией Матери</h4><p><b>Пересечение ул. Сергеева и улицы Ленина</b></p><p>Построена в 1824 году<br/></p><i>Утрачена</i><p><img src='https://kargopol-map.ru/img/church/5-vladimirskaya-0.jpg'/></p>"
				},
				{
					x: 2700,
					y: 2350,
					icon: icon2,
					content: "<h4>Казарма</h4><p><b>ул. Ленина, 35</b></p><p>Построена в 1890 году<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/6-kazarma-0.jpg'/></p>"
				},
				{
					x: 2100,
					y: 2860,
					icon: icon2,
					content: "<h4>Духовное училище</h4><p><b>Красноармейская площадь / пр. Октябрьский, 41</b></p><p>Построено в 1896 году<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/7-duhovnoe-0.jpg'/></p>"
				},
				{
					x: 2220,
					y: 3150,
					icon: icon2,
					content: "<h4>Общежитие духовного училища</h4><p><b>ул. Ленина, 40</b></p><p>Построено в 1904 году<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/8-duhovnoe-life-0.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/8-duhovnoe-life-1.jpg'/></p>"
				},
				{
					x: 1650,
					y: 3200,
					icon: icon2,
					content: "<h4>Собор Рождества Христова</h4><p><b>Соборная площадь / ул. Набережная им. Баранова, 29</b></p><p>Построен: 1552 – 1562 гг<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/9-rozhdestva-0.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/9-rozhdestva-1.jpg'/></p>"
				},
				{
					x: 1700,
					y: 3460,
					icon: icon2,
					content: "<h4>Церковь Введения во храм Пресвятой Богородицы</h4><p><b>Соборная площадь / пр. Октябрьский, 52</b></p><p>Построена: 1808 – 1811 гг.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/10-vvedenia-0.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/10-vvedenia-1.jpg'/></p>"
				},
				{
					x: 1700,
					y: 3530,
					icon: icon2,
					content: "<h4>Соборная колокольня</h4><p><b>Соборная площадь / пр. Октябрьский, 54</b></p><p>Построена: 1772 – 1778 гг.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/11-kolokolna-0.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/11-kolokolna-1.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/11-kolokolna-2.jpg'/></p>"
				},
				{
					x: 1600,
					y: 3780,
					icon: icon2,
					content: "<h4>Церковь Иоанна Предтечи</h4><p><b>Соборная площадь / пр. Октябрьский, 54а</b></p><p>Построена: 1740 – 1751 гг.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/12-ioanna-0.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/12-ioanna-1.jpg'/></p>"
				},
				{
					x: 1450,
					y: 3640,
					icon: icon2,
					content: "<h4>Церковь Входа Господня в Иерусалим</h4><p><b>Соборная площадь</b></p><p>Построена: 1726 – 1732 гг.<br/></p><i>Утрачена</i><p><img src='https://kargopol-map.ru/img/church/13-vhodgospodnya-0.jpg'/></p>"
				},
				{
					x: 1300,
					y: 3640,
					icon: icon2,
					content: "<h4>Гостиный двор</h4><p><b>ул. Победы, 3</b></p><p>Построен: 1806-1808 гг.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/14-gostinny-0.jpg'/></p>"
				},
				{
					x: 1240,
					y: 4770,
					icon: icon2,
					content: "<h4>Церковь Воздвижения Честного и Животворящего Креста Господня</h4><p><b>пр.Октябрьский, 64 – 66</b></p><p>Построена: последняя четверть XVIII в.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/15-vozdvizheniya-0.jpg'/></p>"
				},
				{
					x: 2020,
					y: 5330,
					icon: icon2,
					content: "<h4>Земская больница</h4><p><b>ул. Советская, 44</b></p><p>Построена: Нач. XX в.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/16-hospital-0.jpg'/></p>"
				},
				{
					x: 2100,
					y: 5620,
					icon: icon2,
					content: "<h4>Церковь Сошествия Святого Духа</h4><p><b>ул. Акулова, 37</b></p><p>Построена: 1765 – 1797 гг.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/17-duha-0.jpg'/></p>"
				},
				{
					x: 2100,
					y: 5770,
					icon: icon2,
					content: "<h4>Церковь Вознесения Господня</h4><p><b>ул. Акулова, 39</b></p><p>Построена: 1731 – 1751 гг.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/18-voznesenia-0.jpg'/></p>"
				},
				{
					x: 920,
					y: 4630,
					icon: icon2,
					content: "<h4>Церковь Воскресения Христова</h4><p><b>ул. 3-го Интернационала, д. 8</b></p><p>Построена: ≈1675 – ≈1700<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/19-voskresenia-0.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/19-voskresenia-1.jpg'/></p>"
				},
				{
					x: 820,
					y: 4930,
					icon: icon2,
					content: "<h4>Церковь Спаса Всемилостивого на Воскресенской площади</h4><p><b>Улица Калинина</b></p><p>Построена: начало XVIII в.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/20-spasa-0.jpg'/></p>"
				},
				{
					x: 850,
					y: 6380,
					icon: icon2,
					content: "<h4>Церковь Святой и Живоначальной Троицы</h4><p><b>улица Ленина, 86</b></p><p>Построена: 1790 – 1802<br>1879 — световой барабан и купол.<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/21-troitsy-1.jpg'/></p><p><img src='https://kargopol-map.ru/img/church/21-troitsy-0.jpg'/></p>"
				},
				{
					x: 630,
					y: 5750,
					icon: icon2,
					content: "<h4>Церковь Спаса Нерукотворного Образа на Валушках</h4><p><b>пер. Пролетарский</b></p><p>Построена: 1662 – 1862<br/></p><i></i><p><img src='https://kargopol-map.ru/img/church/22-avsemilostivogo-0.jpg'/></p>"
				},
			];

			L.Map.prototype.panToOffset = function (latlng, offset, options) {
				var x = this.latLngToContainerPoint(latlng).x - offset[0]
				var y = this.latLngToContainerPoint(latlng).y - offset[1]
				var point = this.containerPointToLatLng([x, y])
				return this.setView(point, this._zoom, {
					pan: options
				})
			}

			L.Map.prototype.setViewOffset = function (latlng, offset, targetZoom) {
				var targetPoint = this.project(latlng, targetZoom).subtract(offset),
					targetLatLng = this.unproject(targetPoint, targetZoom);
				return this.setView(targetLatLng, targetZoom);
			}

			data.forEach(function (i) {
				let p = L.marker([i.x, i.y], {
					icon: i.icon
				}).addTo(map).bindPopup(L.popup(popupOpt).setContent(i.content));
				p.on('click', function (e) {
					let w = width / 2;
					let h_offset = width < 800 ? 250 : 150;
					let h = (height / 2) + h_offset;
					map.panToOffset(e.target.getLatLng(), [w, h], {
						"animate": true
					});
					p.openPopup();
				})
			});
		}
	</script>
</body>

<?php require $docroot.'includes/js.php'; ?>

</html>