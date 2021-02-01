
@extends('layouts.layout')


@section('title', 'ponshuki')

@section('content')

<div class="row p-side-origin">
    <div class="col-sm-3">
        @include('shared.side-bar')
    </div>
    <div class="col-sm-9">
        <form action="GET">
            @csrf
            <div  class="input-group mt-5">
                <input type="text" name="name" class="form-control" placeholder="日本酒の名前" autocomplete="on"  list="sake-data">
                <datalist id="sake-data"></datalist>

                <span class="input-group-btn vertical-align">
                <button type="submit" class="search-btn btn btn-primary">検索</button>
                </span>
            </div>
        </form>
        <script src="{{ mix('/js/autocomplete.js') }}"></script>
        <script type="text/javascript"
            src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
            <script type="text/javascript"
            src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>


        {{-- 以下テスト、通常時は総合評価が高い順番に並んでいる --}}
        
        <div class="card mt-5 mb-3">
            
            <div class="card-body">
                <a class="h4 " href=# ><i class="fas fa-user-circle pr-2"></i>harukaさん</a>
                <h5 class="card-title border-bottom">新政  ★★★☆☆</h5>
                <a class="badge badge-pill badge-light ">爽酒</a>
                <img src="/uploads/noimage.jpg" alt="" width="50px" height="50px"  />
            <span class="all-rating">
            味の濃さ ３ /香りの強さ ３ 
            </span>
            <p class="card-text mt-3">近年の日本酒の味の潮流である「芳醇旨口」を代表する酒。
                若き15代目当主の高木顕統さんが酒造りを統括し、米の旨みと甘み、エレガントな香り、心地よい余韻を感じる酒に仕上げている。
                特筆すべきは酒米の育種を行っていることで、「酒未来」「龍の落とし子」「羽州誉」の3種の酒米を開発。さまざまな米を使いながら、
                米と酒の味の世界を追求している。「十四代 純米中取り無濾過」をはじめ正規価格での入手困難な幻の酒の筆頭格。
                刺身、天ぷら、和食などとじっくりと合わせたい。</p>
                
            </div>
        </div>
    

        <div class="card mt-5 mb-3">
            
            <div class="card-body">
                <a class="h4 " href=# ><i class="fas fa-user-circle pr-2"></i>sayakaさん</a>
                <h5 class="card-title border-bottom">陸奥八仙  ★★★☆☆</h5>
            <img src="/uploads/noimage.jpg" alt="" width="50px" height="50px"  />
            <span class="all-rating">
            味の濃さ４ /香りの強さ ３
            </span>
            <p class="card-text mt-3">近年の日本酒の味の潮流である「芳醇旨口」を代表する酒。
                若き15代目当主の高木顕統さんが酒造りを統括し、米の旨みと甘み、エレガントな香り、心地よい余韻を感じる酒に仕上げている。
                特筆すべきは酒米の育種を行っていることで、「酒未来」「龍の落とし子」「羽州誉」の3種の酒米を開発。さまざまな米を使いながら、
                米と酒の味の世界を追求している。「十四代 純米中取り無濾過」をはじめ正規価格での入手困難な幻の酒の筆頭格。
                刺身、天ぷら、和食などとじっくりと合わせたい。</p>
                
            </div>
        </div>

        
        <div class="card mt-5 mb-3">
            
            <div class="card-body">
                <a class="h4 " href=# ><i class="fas fa-user-circle pr-2"></i>tarou さん</a>
                <h5 class="card-title border-bottom">仙禽  ★★★☆☆</h5>
                <span class="badge badge-pill badge-light">爽酒</span>
            <img src="/uploads/noimage.jpg" alt="" width="50px" height="50px"  />
            <span class="all-rating">
            味の濃さ 2 /香りの強さ 4
            </span>
            <p class="card-text mt-3">近年の日本酒の味の潮流である「芳醇旨口」を代表する酒。
                若き15代目当主の高木顕統さんが酒造りを統括し、米の旨みと甘み、エレガントな香り、心地よい余韻を感じる酒に仕上げている。
                特筆すべきは酒米の育種を行っていることで、「酒未来」「龍の落とし子」「羽州誉」の3種の酒米を開発。さまざまな米を使いながら、
                米と酒の味の世界を追求している。「十四代 純米中取り無濾過」をはじめ正規価格での入手困難な幻の酒の筆頭格。
                刺身、天ぷら、和食などとじっくりと合わせたい。</p>
                
            </div>
        </div>
    
        <div class="card mt-5 mb-3">
            
            <div class="card-body">
                <a class="h4 " href=# ><i class="fas fa-user-circle pr-2"></i>jirou さん</a>
                <h5 class="card-title border-bottom">新政  ★★★☆☆</h5>
                <span class="badge badge-pill badge-light">爽酒</span>
                <img src="/uploads/noimage.jpg" alt="" width="50px" height="50px"  />
            <span class="all-rating">
            味の濃さ 3 /香りの強さ  4
            </span>
            <p class="card-text mt-3">近年の日本酒の味の潮流である「芳醇旨口」を代表する酒。
                若き15代目当主の高木顕統さんが酒造りを統括し、米の旨みと甘み、エレガントな香り、心地よい余韻を感じる酒に仕上げている。
                特筆すべきは酒米の育種を行っていることで、「酒未来」「龍の落とし子」「羽州誉」の3種の酒米を開発。さまざまな米を使いながら、
                米と酒の味の世界を追求している。「十四代 純米中取り無濾過」をはじめ正規価格での入手困難な幻の酒の筆頭格。
                刺身、天ぷら、和食などとじっくりと合わせたい。</p>
                
            </div>
            
        </div>
    







        ※<a href="https://sakenowa.com">さけのわデータ</a>を利用しています
    </div>
</div>
@endsection

