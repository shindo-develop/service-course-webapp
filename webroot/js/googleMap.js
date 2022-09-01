// 墨田区のAED設置場所のデータセット（施設名、所在地、緯度、経度、電話番号、施設概要、URL）
const placementOfAEDList = [
    ['両国シティコア' , '墨田区両国二丁目10番14号', 35.693887, 139.79269, '03-5624-1151', '使用可能時間帯：常時', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['スポーツクラブルネサンス両国', '墨田区両国二丁目10番14号 両国シティコア4階', 35.693879, 139.792769, '03-5600-5400', '使用可能時間帯：午前10時～午後11時（土曜日は午後9時30分、日曜日は午後8時まで、月曜日・年末年始は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['財団法人東京都結核予防会', '墨田区両国四丁目5番9号', 35.692559, 139.796028, '03-3633-4053', '使用可能時間帯：午前9時～午後5時（土・日曜日・祝日・年末年始は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['両国小学校', '墨田区両国四丁目26番6号', 35.69372, 139.79519, '03-3634-7876', '使用可能時間帯：午前8時～午後9時（年末年始（12/29～1/3）は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['東京東信用金庫ハロープラザ', '墨田区両国四丁目31番16号', 35.694804, 139.796614, '03-3633-5505', '使用可能時間帯：午前9時～午後6時（土・日曜日・祝日は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['墨東化成工業株式会社', '墨田区千歳一丁目8番14号', 35.691512, 139.793252, '03-3635-1126', '使用可能時間帯：午前9時～午後5時30分（土・日曜日・祝日は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['緑小学校', '墨田区緑二丁目12番12号', 35.694026, 139.801342, '03-3634-6876', '使用可能時間帯：午前8時～午後9時（年末年始（12/29～1/3）は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['緑図書館', '墨田区緑二丁目24番5号', 35.695759, 139.800608, '03-3631-4621', '使用可能時間帯：午前9時～午後8時（日・月曜日・祝日は午後5時まで、年末年始は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['みどりコミュニティセンター', '墨田区緑三丁目7番3号', 35.693615, 139.803267, '03-5608-5811', '使用可能時間帯：午前9時～午後9時（第3月曜日、年末年始は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['本所消防署緑出張所', '墨田区緑四丁目1番8号', 35.69286, 139.806827, '03-3634-2656', '使用可能時間帯：午前8時30分～午後5時（土・日曜日・祝日・年末年始は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['すみだ障害者就労支援総合センター', '墨田区緑四丁目25番4号', 35.69556, 139.807702, '03-5600-2004', '使用可能時間帯：午前8時30分～午後8時（日曜・祝日、年末年始、その他休館日を除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['すみだふれあいセンター福祉作業所', '墨田区緑四丁目35番6号', 35.695803, 139.807656, '03-5600-2001', '使用可能時間帯：午前9時～午後4時（月～金曜日、祝日･年末年始は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['立川児童館', '墨田区立川一丁目5番2号', 35.69051, 139.799481, '03-3619-5781', '使用可能時間帯：午前9時～午後9時（火・水・土・日曜日・祝日は午後７時まで)', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['菊川小学校', '墨田区立川四丁目12番15号', 35.691629, 139.807591, '03-3634-8176', '使用可能時間帯：午前8時～午後9時（年末年始（12/29～1/3）は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['中和小学校', '墨田区菊川一丁目18番10号', 35.690157, 139.802725, '03-3617-7921', '使用可能時間帯：午前8時～午後9時（年末年始（12/29～1/3）は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['都営地下鉄菊川駅', '墨田区菊川三丁目16番2号', 35.688385, 139.80602, '03-3634-5291', '使用可能時間帯：始発の時刻～終電の時刻（営業時間内）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html']
];

// Initialize and add the map
function initMap() {
    // マップの中心を都庁に設定（緯度lat, 経度lng）
    const TOKYO_GOVEMENT_OFFICE = { lat: 35.689, lng: 139.691 };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: TOKYO_GOVEMENT_OFFICE,
    });
    // The marker, positioned at TOKYO_GOVEMENT_OFFICE
    const marker = new google.maps.Marker({
        position: TOKYO_GOVEMENT_OFFICE,
        map: map,
    });

    // 墨田区のAEDの設置場所を描画
    for(let i = 0; i < placementOfAEDList.length; i++){
        const eachPlacementOfAED = placementOfAEDList[i];
        const eachLatitude = eachPlacementOfAED[2]
        const eachLongitude = eachPlacementOfAED[3]
        const eachLocation = {
            lat: eachLatitude,
            lng: eachLongitude
        };

        const eachMeker = new google.maps.Marker({
            position: eachLocation,
            map: map
        });
    };
}

window.initMap = initMap;
