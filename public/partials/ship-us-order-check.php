<div class="col-md-12 col-xs-12 order-calc">
    <h4 class="order-calc-title bold">TÍNH GIÁ VỀ VIỆT NAM</h4> 
    <form>
        <div class="form-group row form-sm">
            <label for="staticEmail" class="col-sm-4 home-form-label font-14">Nhập giá trên web(Mỹ)</label> 
            <div class="col-sm-8">
                <input type="number" id="product_price" placeholder="ví dụ: 99 (USD)" class="form-control">
            </div>
        </div> 
        <div class="form-group row form-sm">
            <label for="staticEmail" class="col-sm-4 home-form-label font-14">Cân nặng(g)</label> 
            <div class="col-sm-8">
                <input type="number" id="product_weight" placeholder="ví dụ: 500 (g)" class="form-control">
            </div>
        </div> 
        <div class="form-group row form-sm">
            <label for="staticEmail" class="col-sm-4 home-form-label font-14"> Giá về Việt Nam</label> 
            <div class="col-sm-8">
                <input type="text" disabled="disabled" id="total_price" placeholder="(VND)" class="form-control">
            </div>
        </div> 
    </form>
    <script type="text/javascript">
        
        var $price = document.getElementById('product_price'),
            $weight = document.getElementById('product_weight'),
            $total = document.getElementById('total_price');
        $price.onchange = function(e) {
            if($price.value != '' && $weight.value != '') {
                $total.value = (($price.value * 0.145 + $weight.value * 6.9) * 23700).formatMoney(0, '.', ',') + " VND";
            }
        }
        $weight.onchange = function(e) {
            if($price.value != '' && $weight.value != '') {
                $total.value = (($price.value * 0.145 + $weight.value * 6.9) * 23700).formatMoney(0, '.', ',') + " VND";
            }
        }
        Number.prototype.formatMoney = function(c, d, t){
            var n = this, 
            c = isNaN(c = Math.abs(c)) ? 2 : c, 
            d = d == undefined ? "." : d, 
            t = t == undefined ? "," : t, 
            s = n < 0 ? "-" : "", 
            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
            j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        };
    </script>
</div>