-- Color

CREATE TABLE colors (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  red INT,
  green INT,
  blue INT
);

INSERT INTO colors VALUES (NULL, 'Black',     0,   0,   0);
INSERT INTO colors VALUES (NULL, 'Red',     255,   0,   0);
INSERT INTO colors VALUES (NULL, 'Green',     0, 255,   0);
INSERT INTO colors VALUES (NULL, 'Blue',      0,   0, 255);
INSERT INTO colors VALUES (NULL, 'Cyan',      0, 255, 255);
INSERT INTO colors VALUES (NULL, 'Magenta', 255,   0, 255);
INSERT INTO colors VALUES (NULL, 'Yellow',  255, 255,   0);
INSERT INTO colors VALUES (NULL, 'White',   255, 255, 255);

-- Sudokus
CREATE TABLE sudokus (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  level INT,
  problem CHAR(81),
  solved CHAR(81)
);

INSERT INTO sudokus VALUES (NULL, 5, '8.......7...6....3276.5.9..3..9.7.1..2.....9..4.3.1..6..1.3.2655....8...6.......4', '853194627419672583276853941365987412127546398948321756781439265534268179692715834');
INSERT INTO sudokus VALUES (NULL, 5, '.4.5.6.1.6.......7..5.3.6...51.7.23..8..4..7..93.8.16...9.5.4..1.......3.3.1.2.8.', '347526819628914357915837642451679238286341975793285164869753421172468593534192786');
INSERT INTO sudokus VALUES (NULL, 5, '3.7...5.2.1.5.3.6.8.......4..86.97...7.....5...67.12..7.......6.3.8.7.9.5.2...4.8', '347968512219543867865172934128659743973284651456731289781495326634827195592316478');
INSERT INTO sudokus VALUES (NULL, 5, '8.......7...6....3276.5.9..3..9.7.1..2.....9..4.3.1..6..1.3.2655....8...6.......4', '853194627419672583276853941365987412127546398948321756781439265534268179692715834');
INSERT INTO sudokus VALUES (NULL, 5, '.21.3.4..6.......84.7.1....2.57..6...9.....2...6..51.9....9.8.48.......7..2.6.35.', '521938476639472518487516932215789643398641725746325189153297864864153297972864351');
INSERT INTO sudokus VALUES (NULL, 5, '.1..4..8....7.3.4.....2..371....795..9.3.5.6..749....836..9.....5.8.6....8..3..7.', '713649285628753149945128637136487952892315764574962318367594821251876493489231576');
INSERT INTO sudokus VALUES (NULL, 5, '1...8..4365.1...9...85.21....3.2.65.2..4.7..9.19.6.4....26.17...9...4.2657..3...4', '127986543654173298938542167743829651265417389819365472482691735391754826576238914');
INSERT INTO sudokus VALUES (NULL, 5, '3....165..2..8.93.7..9....2....4..79..8...5..45..6....5....4..8.42.9..1..672....4', '389421657624587931715936482236845179978312546451769823593174268842693715167258394');
INSERT INTO sudokus VALUES (NULL, 5, '...4...1.......37.2..19.8.66...2..4.83.....92.1..5...34.1.35..7.28.......9...7...', '356478219189562374247193856675329148834716592912854763461235987728941635593687421');
INSERT INTO sudokus VALUES (NULL, 5, '...48.953....9..78..3...2..7..8...2...6...4...1...6..7..2...5..36..7....981.23...', '627481953154392678893657241749835126236719485518246397472168539365974812981523764');
INSERT INTO sudokus VALUES (NULL, 5, '.2.8..37.3...7.1.57...4.....49..1.5.....2.....3.7..62.....9...19.1.5...8.52..6.9.', '524819376398672145716543982249361857687925413135784629473298561961457238852136794');
INSERT INTO sudokus VALUES (NULL, 5, '...8...7.......52.7..43.8.92...5..9.17.....43.8..6...53.9.46..2.21.......4...2...', '596821374438679521712435869263154798175298643984367215359746182621983457847512936');
INSERT INTO sudokus VALUES (NULL, 5, '...9.....6...35.7..81.4.235.9....71....5.4....28....6.356.1.92..7.38...1.....2...', '537921486642835179981746235495268713163574892728193564356417928274389651819652347');
INSERT INTO sudokus VALUES (NULL, 5, '9.45.81.6..29.43...8...6..41...9.46..9.....5..28.5...78..4...2...93.75..7.12.56.9', '934528176612974385587136294175892463396741852428653917853469721269317548741285639');
INSERT INTO sudokus VALUES (NULL, 5, '64.8...3225.7.31....1..5..95.....21.7..5.4..6.98.....74..1..8....36.9.2492...7.61', '647891532259763148381245679564978213732514986198326457476132895813659724925487361');
INSERT INTO sudokus VALUES (NULL, 5, '..4.789..12.9.5....58.6.7..84..1.3.6.1.....4.5.3.9..28..6.5.27....7.9.81..162.4..', '364278915127935864958164732842517396619382547573496128496851273235749681781623459');
INSERT INTO sudokus VALUES (NULL, 5, '7.6...9.83.4.8.2.1...9.5.....54.18.............23.94.....1.6...9.3.2.5.61.8...7.4', '756214938394687251281935647635471892479852163812369475527146389943728516168593724');
INSERT INTO sudokus VALUES (NULL, 5, '.7.84.....8.3...17..19..2........9548...3...1965........3..85..62...3.7.....72.8.', '276841395489325617351967248137286954842539761965714832713498526628153479594672183');
INSERT INTO sudokus VALUES (NULL, 5, '2.3...8.9.4.8.7.6.6..1.9..3..85.17.............63.45..4..9.5..7.1.6.8.9.8.9...1.4', '273456819941837265685129473328591746154762938796384521432915687517648392869273154');
INSERT INTO sudokus VALUES (NULL, 5, '.1.953.7.7.......3..3...1..18.7.5.32....4....64.2.1.97..4...6..5.......9.2.678.5.', '416953278752186943893427165189765432237849516645231897374592681568314729921678354');
INSERT INTO sudokus VALUES (NULL, 5, '.2.8..37.3...7.1.57...4.....49..1.5.....2.....3.7..62.....9...19.1.5...8.52..6.9.', '524819376398672145716543982249361857687925413135784629473298561961457238852136794');
INSERT INTO sudokus VALUES (NULL, 5, '...8...7.......52.7..43.8.92...5..9.17.....43.8..6...53.9.46..2.21.......4...2...', '596821374438679521712435869263154798175298643984367215359746182621983457847512936');
INSERT INTO sudokus VALUES (NULL, 5, '...8...7.......52.7..43.8.92...5..9.17.....43.8..6...53.9.46..2.21.......4...2...', '596821374438679521712435869263154798175298643984367215359746182621983457847512936');
INSERT INTO sudokus VALUES (NULL, 5, '...8...7.......52.7..43.8.92...5..9.17.....43.8..6...53.9.46..2.21.......4...2...', '596821374438679521712435869263154798175298643984367215359746182621983457847512936');
INSERT INTO sudokus VALUES (NULL, 5, '2.49...5.....5........43..64.9..62..5.7...3.9..13..8.71..58........6.....5...76.4', '264918753713652498895743126439876215587421369621395847176584932348269571952137684');
INSERT INTO sudokus VALUES (NULL, 6, '.7..1.8......8..59....534.768...7.3.....4.....2.1...982.397....51..6......6.2..7.', '475619823132784659968253417681597234359842761724136598243975186517368942896421375');
INSERT INTO sudokus VALUES (NULL, 6, '.59.8.7..3.......21.2.4....9.82..6...3.....4...7..45.8....5.1.78.......3..3.1.86.', '659382714374561982182947356948235671531678249267194538496853127815726493723419865');
INSERT INTO sudokus VALUES (NULL, 6, '.59.8.7..3.......21.2.4....9.82..6...3.....4...7..45.8....5.1.78.......3..3.1.86.', '659382714374561982182947356948235671531678249267194538496853127815726493723419865');
INSERT INTO sudokus VALUES (NULL, 6, '.7..1.8......8..59....534.768...7.3.....4.....2.1...982.397....51..6......6.2..7.', '475619823132784659968253417681597234359842761724136598243975186517368942896421375');
INSERT INTO sudokus VALUES (NULL, 6, '.7.4.....65....2.3..3.2...17.9.36....8.....4....29.8.71...7.6..9.7....52.....9.1.', '271483569654917283893625471749836125382751946516294837138572694967148352425369718');
INSERT INTO sudokus VALUES (NULL, 6, '..382.7....7.....44..5..89..65.73...............46.32..14..9..26.....1....8.159..', '193824756587196234426537891865273419342951678971468325714389562659742183238615947');
INSERT INTO sudokus VALUES (NULL, 6, '.2.365.7.6.......2..9...8..95.6.3.24....4....43.8.9.51..6...4..2.......7.4.197.6.', '824365179673981542519724836958613724167542983432879651796238415281456397345197268');
INSERT INTO sudokus VALUES (NULL, 6, '84.....56...2.5...1.7...9.2..38.91...9.....2...51.27..2.8...5.4...6.8...56.....37', '842917356936285471157346982623879145791534628485162793218793564374658219569421837');
INSERT INTO sudokus VALUES (NULL, 6, '.8.3..42.2...4.9.14...8.....62..3.7.....9.....5.6..29.....3...63.9.5...2.17..8.5.', '781369425236547981495182637962813574874295163153674298528931746349756812617428359');
INSERT INTO sudokus VALUES (NULL, 6, '.8.3..42.2...4.9.14...8.....62..3.7.....9.....5.6..29.....3...63.9.5...2.17..8.5.', '781369425236547981495182637962813574874295163153674298528931746349756812617428359');
INSERT INTO sudokus VALUES (NULL, 6, '...47...35.8.1.4.......2..6.7169.3....5...9....6.3724.1..8.......3.5.7.89...61...', '619475823528316479734982156271694385345128967896537241157843692463259718982761534');
INSERT INTO sudokus VALUES (NULL, 6, '..87.93..3.1...57.....63.......762.59.......12.794.......68.....35...1.4..43.58..', '428759316361428579579163482143876295986532741257941638712684953835297164694315827');
INSERT INTO sudokus VALUES (NULL, 6, '9.1...8.7.2.6.7.3.4..5.9..2..24.85.............53.16..6..7.4..1.5.1.2.8.2.7...9.5', '961243857528617439473589162192468573836975214745321698689754321354192786217836945');
INSERT INTO sudokus VALUES (NULL, 6, '.837.9..5.17.....94..6.....83...7....42...68....2...91.....3..29.....81.3..8.245.', '283749165617358249495621738839167524142935687756284391568413972924576813371892456');
INSERT INTO sudokus VALUES (NULL, 6, '...58.647....6..51..2...8..6..3...9...5...4...7...4..8..1...7..38..2....297.31...', '913582647748963251562147839624378195835619472179254368451896723386725914297431586');
INSERT INTO sudokus VALUES (NULL, 6, '.5.613.8.3.......9..8...5..52.4.8.71....6....94.3.1.62..5...4..6.......5.7.925.3.', '459613287312587649768249513526498371183762954947351862235176498691834725874925136');
INSERT INTO sudokus VALUES (NULL, 6, '.5.613.8.3.......9..8...5..52.4.8.71....6....94.3.1.62..5...4..6.......5.7.925.3.', '459613287312587649768249513526498371183762954947351862235176498691834725874925136');
INSERT INTO sudokus VALUES (NULL, 6, '...58.647....6..51..2...8..6..3...9...5...4...7...4..8..1...7..38..2....297.31...', '913582647748963251562147839624378195835619472179254368451896723386725914297431586');
INSERT INTO sudokus VALUES (NULL, 6, '.....2.6.91...72...4.6..9...3..18.4.1.......6.7.95..8...3..5.7...73...94.6.4.....', '358192467916547238742683915635218749189734526274956183493825671527361894861479352');
INSERT INTO sudokus VALUES (NULL, 6, '.6.517......2....4.9......35......76.819.354.24......17......6.3....2......861.3.', '463517928875239614192486753539124876681973542247658391728345169316792485954861237');
INSERT INTO sudokus VALUES (NULL, 6, '52.6...3116.3.59....9..4..72.....76.9..8.6..5.18.....93..4..8....65.8.2448...7.93', '527689431164375982839124657245913768973846215618752349352491876796538124481267593');
INSERT INTO sudokus VALUES (NULL, 6, '..6....18.87.13...2..4.....5.92.8....1.....8....1.43.9.....5..3...93.26.49....7..', '346527918987613425251489637539278146714396582628154379162745893875931264493862751');
INSERT INTO sudokus VALUES (NULL, 6, '74.....53.8..5..9...19.46.....5.7...3.......1...8.2.....81.32...7..9..1.21.....46', '749628153682351794531974682826517439357469821194832567968143275475296318213785946');
INSERT INTO sudokus VALUES (NULL, 6, '5....1...2...5.48.9.7..8...364...8..1.......3..8...965...6..2.4.35.9...7...7....8', '586421379213957486947368152364579821159286743728143965871635294435892617692714538');
INSERT INTO sudokus VALUES (NULL, 6, '.795.4..2.43.....16..1.....51...3....26...58....2...49.....8..42.....69.4..6.583.', '179584362843762951652139478514893726926417583738256149365978214287341695491625837');
INSERT INTO sudokus VALUES (NULL, 7, '..65..7...5..3.29..4......35....3.4.....8.....8.1....96......8..19.7..2...4..25..', '936528714157436298248917653591763842463289175782154369625341987319875426874692531');
INSERT INTO sudokus VALUES (NULL, 7, '..648.9....5.....29..2..86..83.71...............53.17..19..6..87.....3....4.572..', '126485937835769412947213865483671529571924683692538174219346758758192346364857291');
INSERT INTO sudokus VALUES (NULL, 7, '15..9.6.2..2.....36....3.1...94.8...4...1...8...2.57...3.9....19.....3..2.8.6..54', '153794682782156493694823517329478165475619238861235749536942871947581326218367954');
INSERT INTO sudokus VALUES (NULL, 7, '96..843...3.9..6.127..........5....6...2.9...1....8..........876.4..1.9...942..65', '961784352438952671275136849823547916546219738197368524312695487654871293789423165');
INSERT INTO sudokus VALUES (NULL, 7, '96..843...3.9..6.127..........5....6...2.9...1....8..........876.4..1.9...942..65', '961784352438952671275136849823547916546219738197368524312695487654871293789423165');
INSERT INTO sudokus VALUES (NULL, 7, '15..9.6.2..2.....36....3.1...94.8...4...1...8...2.57...3.9....19.....3..2.8.6..54', '153794682782156493694823517329478165475619238861235749536942871947581326218367954');
INSERT INTO sudokus VALUES (NULL, 7, '..648.9....5.....29..2..86..83.71...............53.17..19..6..87.....3....4.572..', '126485937835769412947213865483671529571924683692538174219346758758192346364857291');
INSERT INTO sudokus VALUES (NULL, 7, '..65..7...5..3.29..4......35....3.4.....8.....8.1....96......8..19.7..2...4..25..', '936528714157436298248917653591763842463289175782154369625341987319875426874692531');
INSERT INTO sudokus VALUES (NULL, 7, '...2.8..357.3..1...6.9...........6.773.....481.4...........7.8...5..3.922..6.9...', '491278563578364129362951874859432617736195248124786935913527486645813792287649351');
INSERT INTO sudokus VALUES (NULL, 7, '15.....46..63.79..8.......7..41.98..5.......3..34.67..6.......9..52.36..37.....18', '157892346426317985839645127764139852591728463283456791648571239915283674372964518');
INSERT INTO sudokus VALUES (NULL, 7, '..46..97.1.....3.5.5..8...6.8...14.....8.5.....34...2.2...3..1.9.6.....4.71..86..', '824653971167294385359187246685321497492875163713469528248536719936712854571948632');
INSERT INTO sudokus VALUES (NULL, 7, '...14...71.3.2.8.......9..4.8691.7....1...6....9.5231.7..3.......5.8.4.66...94...', '892146537143527869567839124286913745351478692479652318724365981935281476618794253');
INSERT INTO sudokus VALUES (NULL, 7, '..9.3..1......1...3..6.9.4.25.7..6...6.....9...4..8.73.8.4.6..5...9......2..7.4..', '549237816672841359318659742253794681867312594194568273781426935436985127925173468');
INSERT INTO sudokus VALUES (NULL, 7, '.....1.4342............39.586..39.5..9.....1..1.78..292.86............8763.4.....', '759861243423957168186243975862139754397524816514786329278695431945312687631478592');
INSERT INTO sudokus VALUES (NULL, 7, '21.....79..96..1..5..7.1...8...2.31.....5.....31.7...2...2.4..1..6..89..18.....54', '214385679379642185568791423857429316642153798931876542795234861426518937183967254');
INSERT INTO sudokus VALUES (NULL, 7, '.3..9..7...76.89..2.......51.2...3.7...4.1...8.5...6.45.......3..42.71...8..4..9.', '638592471457618932219374865142956387376481529895723614521869743964237158783145296');
INSERT INTO sudokus VALUES (NULL, 7, '....6.2..23.....9..674..8....25..63....1.7....19..35....4..578..9.....54..1.9....', '145968273238751496967432815782549631356127948419683527624315789893276154571894362');
INSERT INTO sudokus VALUES (NULL, 7, '..9.14.....48..6.....2...47..85..9.6.1.....2.4.6..21..37...5.....1..67.....92.3..', '789614235524873691163259847238541976917368524456792183372185469891436752645927318');
INSERT INTO sudokus VALUES (NULL, 7, '4....862..6..5.39.7..2....4....9..62..3...8..54..1....2....1..6.17.2..5..947....3', '431978625862154397759236184178493562923567841546812739285341976317629458694785213');
INSERT INTO sudokus VALUES (NULL, 7, '7..8...64.4..9....69...5.1.5.2.63...............42.1.5.5.9...48....3..7.17...6..9', '735812964241697583698345712582163497413759826967428135356971248829534671174286359');
INSERT INTO sudokus VALUES (NULL, 7, '2...8..1....4..2..5.3..16....2.....69.51.84.78.....9....76..3.4..6..3....5..2...9', '249586713681437295573291648712945836935168427864372951127659384496813572358724169');
INSERT INTO sudokus VALUES (NULL, 7, '..........5.4.8.9..265.143.3..1.9..5..28.43..4..7.3..9.843.596..9.2.6.1..........', '849632751153478692726591438378169245912854376465723189284315967597246813631987524');
INSERT INTO sudokus VALUES (NULL, 7, '..6....89.97.16...2..3.....9.41.2....8.....6....7.39.5.....7..3...84.59.17....6..', '436275189897416352215398476954162738783954261621783945549627813362841597178539624');
INSERT INTO sudokus VALUES (NULL, 7, '..6....89.97.16...2..3.....9.41.2....8.....6....7.39.5.....7..3...84.59.17....6..', '436275189897416352215398476954162738783954261621783945549627813362841597178539624');
INSERT INTO sudokus VALUES (NULL, 7, '38.....54..42..9..5..8.1...2...5.67.....1.....17.2...5...5.6..9..3..25..87.....62', '381967254764235918529841736238459671956718423417623895142576389693182547875394162');
INSERT INTO sudokus VALUES (NULL, 8, '.8154..96..3......49.8..7...4..1.2.............5.2..7...7..1.59......8..95..3614.', '781542396563179428492863715849715263276394581135628974327481659614957832958236147');
INSERT INTO sudokus VALUES (NULL, 8, '6....9.8....13..6..7.2....4.87.1....2..3.5..8....4.65.9....1.3..1..57....6.4....9', '634579281829134765175286394587612943246395178391748652952861437413957826768423519');
INSERT INTO sudokus VALUES (NULL, 8, '....3.416..4.....7.3...2.5....6..7..72.9.5.61..3..1....9.1...7.4.....8..857.6....', '275839416984516237136472958519683742728945361643721589392158674461397825857264193');
INSERT INTO sudokus VALUES (NULL, 8, '.94.31....2..4..59.7...9.4.2...6....9.8...5.6....1...4.3.7...8.68..2..9....18.32.', '594831762321647859876259143213465978948372516765918234132794685687523491459186327');
INSERT INTO sudokus VALUES (NULL, 8, '5....786..3..1.47.6..8....3....2..18..2...6..34..6....1....2..9.87.9..3..965....2', '524937861839216475671845923965724318712358694348169257153682749287491536496573182');
INSERT INTO sudokus VALUES (NULL, 8, '.....594.3.68..2......9....5......8273.5.2.6162......9....4......3..98.6.517.....', '172635948396814257485297613514963782739582461628471539967348125243159876851726394');
INSERT INTO sudokus VALUES (NULL, 8, '.4.9..68....15..3.3.........596.4..3.8.....4.1..2.597.........8.6..12....28..7.9.', '541923687872156439396748125259674813687391542134285976715439268963812754428567391');
INSERT INTO sudokus VALUES (NULL, 8, '.4.9..68....15..3.3.........596.4..3.8.....4.1..2.597.........8.6..12....28..7.9.', '541923687872156439396748125259674813687391542134285976715439268963812754428567391');
INSERT INTO sudokus VALUES (NULL, 8, '..2.4..3......6...8..9.5.1.28.1..7...9.....4...6..8.23.1.3.9..2...8......5..1.6..', '562741839931286574874935216283194765795623148146578923617359482429867351358412697');
INSERT INTO sudokus VALUES (NULL, 8, '.3.....1...7...2..64.821.37.6.1.5.8.9.......6.8.4.3.5.82.347.91..1...4...7.....2.', '238756914517934268649821537764195382953278146182463759825347691391682475476519823');
INSERT INTO sudokus VALUES (NULL, 8, '.9.....5...6.8.1..87.....63..47913.............26459..95.....82..7.3.4...6.....3.', '391267854246583179875419263584791326619328547732645918953174682127836495468952731');
INSERT INTO sudokus VALUES (NULL, 8, '3.....61..65..1.....1..93..9...2..3..53...79..4..3...6..21..8.....8..47..86.....1', '394257618765381249821649357918726534653418792247935186572194863139862475486573921');
INSERT INTO sudokus VALUES (NULL, 8, '3.....61..65..1.....1..93..9...2..3..53...79..4..3...6..21..8.....8..47..86.....1', '394257618765381249821649357918726534653418792247935186572194863139862475486573921');
INSERT INTO sudokus VALUES (NULL, 8, '.9.....5...6.8.1..87.....63..47913.............26459..95.....82..7.3.4...6.....3.', '391267854246583179875419263584791326619328547732645918953174682127836495468952731');
INSERT INTO sudokus VALUES (NULL, 8, '...6..9..42.....1...9..5.3..9528..7.3.......8.8..9714..7.5..8...5.....69..3..8...', '531642987428739516769815432195284673347156298286397145974563821852471369613928754');
INSERT INTO sudokus VALUES (NULL, 8, '...6..9..42.....1...9..5.3..9528..7.3.......8.8..9714..7.5..8...5.....69..3..8...', '531642987428739516769815432195284673347156298286397145974563821852471369613928754');
INSERT INTO sudokus VALUES (NULL, 8, '79...1..6.2.3...58....6....2......9...4.7.5...6......4....4....51...6.2.6..8...37', '795281346126394758483567912257418693934672581861953274372149865518736429649825137');
INSERT INTO sudokus VALUES (NULL, 8, '.6..1..8...93.52..5.......79.4...5.2...4.2...3.7...9.61.......4..68.91...7..6..2.', '762914385849375261531286497984637512615492738327158946198723654256849173473561829');
INSERT INTO sudokus VALUES (NULL, 8, '9...8...5.6...572..3.41.....1....6..7.9...8.1..8....4.....28.9..971...6.2...7...3', '974286315861395724532417986315849672749562831628731549153628497497153268286974153');
INSERT INTO sudokus VALUES (NULL, 8, '79...1..6.2.3...58....6....2......9...4.7.5...6......4....4....51...6.2.6..8...37', '795281346126394758483567912257418693934672581861953274372149865518736429649825137');
INSERT INTO sudokus VALUES (NULL, 8, '...6..9..42.....1...9..5.3..9528..7.3.......8.8..9714..7.5..8...5.....69..3..8...', '531642987428739516769815432195284673347156298286397145974563821852471369613928754');
INSERT INTO sudokus VALUES (NULL, 8, '.973.512..........51.....67..85.76...6..9..4...92.48..87.....32..........517.249.', '697345128283176954514928367428537619765891243139264875876419532942653781351782496');
INSERT INTO sudokus VALUES (NULL, 8, '3.....61..65..1.....1..93..9...2..3..53...79..4..3...6..21..8.....8..47..86.....1', '394257618765381249821649357918726534653418792247935186572194863139862475486573921');
INSERT INTO sudokus VALUES (NULL, 8, '3.....61..65..1.....1..93..9...2..3..53...79..4..3...6..21..8.....8..47..86.....1', '394257618765381249821649357918726534653418792247935186572194863139862475486573921');
INSERT INTO sudokus VALUES (NULL, 8, '...98.412....2..95..2...3..6..8...7...5...8...4...6..3..9...7..31..9....478.35...', '563987412784321695192564387631859274925473861847216953259148736316792548478635129');

-- Players
CREATE TABLE players (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255),
  password VARCHAR(255),
  email VARCHAR(255)
);

-- Games
CREATE TABLE games (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  sudoku_id INT NOT NULL REFERENCES sudoku.id,
  player_id INT NOT NULL REFERENCES player.id,
  current VARCHAR(81),  -- current state of the game
  total_time INT,       -- seconds playing
  finished CHAR(1)      -- 0=not-finished; 1=finished
);