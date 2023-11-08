<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>FAQ Template | CodyHouse</title>
</head>
<body>
<header class="cd-header flex flex-column flex-center">
  <div class="text-component text-center">
    <h1>FAQ Template</h1>
    <p>👈 <a class="cd-article-link" href="https://codyhouse.co/gem/css-faq-template">Article &amp; Download</a></p>
  </div>
</header>

<section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
	<ul class="cd-faq__categories">
		{{-- <li><a class="cd-faq__category cd-faq__category-selected truncate" href="#basics">Basics</a></li> --}}
		{{-- <li><a class="cd-faq__category truncate" href="#mobile">Mobile</a></li>
		<li><a class="cd-faq__category truncate" href="#account">Account</a></li>
		<li><a class="cd-faq__category truncate" href="#payments">Payments</a></li>
		<li><a class="cd-faq__category truncate" href="#privacy">Privacy</a></li>
		<li><a class="cd-faq__category truncate" href="#delivery">Delivery</a></li> --}}
	</ul> <!-- cd-faq__categories -->

	<div id="basicss" class="cd-faq__items">
		

		
	</div>


    <script>
        getFaq();
    async function getFaq() {

        let url = "/data";
        let res=await axios.get(url);
        document.getElementById("basicss");
        res.data['data'].forEach((item,i)=>{
            let EachItem=`<ul id="basics" class="cd-faq__group">
                            <li class="cd-faq__title"><h2>Basics</h2></li>
                            <li class="cd-faq__item">
                                <a class="cd-faq__trigger" href="#0"><span>${item['question']}</span></a>
                                <div class="cd-faq__content">
                        <div class="text-component">
                            <p>${item['answer']}</p>
                        </div>
                                </div>
                            </li>

                            
                        </ul>`
            // $("#byBrandList").append(EachItem);
            document.getElementById("basicss").append(EachItem);
                    });
    }

    </script>




	<a href="#0" class="cd-faq__close-panel text-replace">Close</a>
  
  <div class="cd-faq__overlay" aria-hidden="true"></div>
</section> <!-- cd-faq -->
<script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
<script src="assets/js/main.js"></script> 
</body>
</html>