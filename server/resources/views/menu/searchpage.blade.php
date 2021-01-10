
@extends('layouts.layout')


@section('title', 'ponshuki')

@section('content')
<div class="p-side-origin">
    <div class="col-sm-4">
        @include('shared.side-bar')
    </div>
    <div class="col-sm-8">
        <form action="POST">
            @csrf
            <div  class="input-group mt-5">
                <input type="text" class="form-control" placeholder="日本酒の名前">
                <span class="input-group-btn vertical-align">
                <button type="submit" class="search-btn btn btn-primary">検索</button>
                </span>
            </div>
        </form>

        <div class="card mt-5 mb-3" style="width: 40rem;">
            
            <div class="card-body">
                <h5 class="card-title border-bottom">十四代</h5>
            <img src="https://makeshop-multi-images.akamaized.net/joylab/shopimages/19/01/1_000000000119.jpg?1600083302" alt="" width="50px" height="50px" border="0" />
            <span class="all-rating">
            味の濃さ 3 /香りの強さ 5 /総合評価 4
            </span>
            <p class="card-text mt-3">近年の日本酒の味の潮流である「芳醇旨口」を代表する酒。
                若き15代目当主の高木顕統さんが酒造りを統括し、米の旨みと甘み、エレガントな香り、心地よい余韻を感じる酒に仕上げている。
                特筆すべきは酒米の育種を行っていることで、「酒未来」「龍の落とし子」「羽州誉」の3種の酒米を開発。さまざまな米を使いながら、
                米と酒の味の世界を追求している。「十四代 純米中取り無濾過」をはじめ正規価格での入手困難な幻の酒の筆頭格。
                刺身、天ぷら、和食などとじっくりと合わせたい。</p>
                <span class="badge badge-pill badge-light">爽酒</span>
            </div>
        </div>
        
        <div class="card mt-5 mb-3" style="width: 40rem;">
            
            <div class="card-body">
                <h5 class="card-title border-bottom">十四代</h5>
            <img src="https://makeshop-multi-images.akamaized.net/joylab/shopimages/19/01/1_000000000119.jpg?1600083302" alt="" width="50px" height="50px" border="0" />
            
            <p class="card-text mt-3">近年の日本酒の味の潮流である「芳醇旨口」を代表する酒。
                若き15代目当主の高木顕統さんが酒造りを統括し、米の旨みと甘み、エレガントな香り、心地よい余韻を感じる酒に仕上げている。
                特筆すべきは酒米の育種を行っていることで、「酒未来」「龍の落とし子」「羽州誉」の3種の酒米を開発。さまざまな米を使いながら、
                米と酒の味の世界を追求している。「十四代 純米中取り無濾過」をはじめ正規価格での入手困難な幻の酒の筆頭格。
                刺身、天ぷら、和食などとじっくりと合わせたい。</p>
                <span class="badge badge-pill badge-light">爽酒</span>
            </div>
        </div>

        <div class="card mt-5 mb-3" style="width: 40rem;">
            
            <div class="card-body">
                <h5 class="card-title border-bottom">十四代</h5>
            <img src="https://makeshop-multi-images.akamaized.net/joylab/shopimages/19/01/1_000000000119.jpg?1600083302" alt="" width="50px" height="50px" border="0" />
            
            <p class="card-text mt-3">近年の日本酒の味の潮流である「芳醇旨口」を代表する酒。
                若き15代目当主の高木顕統さんが酒造りを統括し、米の旨みと甘み、エレガントな香り、心地よい余韻を感じる酒に仕上げている。
                特筆すべきは酒米の育種を行っていることで、「酒未来」「龍の落とし子」「羽州誉」の3種の酒米を開発。さまざまな米を使いながら、
                米と酒の味の世界を追求している。「十四代 純米中取り無濾過」をはじめ正規価格での入手困難な幻の酒の筆頭格。
                刺身、天ぷら、和食などとじっくりと合わせたい。</p>
                <span class="badge badge-pill badge-light">爽酒</span>
            </div>
        </div>

        <div class="card mt-5 mb-3" style="width: 40rem;">
            
            <div class="card-body">
                <h5 class="card-title border-bottom">十四代</h5>
            <img src="https://makeshop-multi-images.akamaized.net/joylab/shopimages/19/01/1_000000000119.jpg?1600083302" alt="" width="50px" height="50px" border="0" />
            
            <p class="card-text mt-3">近年の日本酒の味の潮流である「芳醇旨口」を代表する酒。
                若き15代目当主の高木顕統さんが酒造りを統括し、米の旨みと甘み、エレガントな香り、心地よい余韻を感じる酒に仕上げている。
                特筆すべきは酒米の育種を行っていることで、「酒未来」「龍の落とし子」「羽州誉」の3種の酒米を開発。さまざまな米を使いながら、
                米と酒の味の世界を追求している。「十四代 純米中取り無濾過」をはじめ正規価格での入手困難な幻の酒の筆頭格。
                刺身、天ぷら、和食などとじっくりと合わせたい。</p>
                <span class="badge badge-pill badge-light">爽酒</span>
            </div>
        </div>








    </div>
</div>
@endsection

