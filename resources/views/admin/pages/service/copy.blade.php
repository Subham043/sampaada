@extends('admin.layouts.master')


@section('content')

@include('admin.pages.service.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              

              <!-- General Form Elements -->
              <form method="POST" onsubmit="formHandler(event)" class="" id="mainForm" enctype="multipart/form-data" >
              <h5 class="card-title">Copy Service</h5>
              @csrf
              <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="row mb-3">
                  <label for="title" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="{{$service->title}}" required>
                    <div class="invalid-feedback">Please enter the title!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="service_category_id">Service Category</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="service_category_id" name="service_category_id" required>
                      <option value="null">Open this select menu</option>
                      @foreach ($service_category as $item)
                      <option value="{{$item->id}}" {{$item->id == $service->service_category_id ? 'selected' : ''}}>{{$item->name}}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback">Please enter the service category!</div>
                  </div>
                </div>

                <div id="service-sub-category-parent">
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="service_sub_category_id">Service Sub-Category</label>
                    <div class="col-sm-10">
                      <select class="form-select" aria-label="Default select example" id="service_sub_category_id" name="service_sub_category_id" required>
                        <option value="null">Open this select menu</option>
                        @foreach ($service_sub_category as $item_sub)
                        <option value="{{$item_sub->id}}" {{$item_sub->id == $service->service_sub_category_id ? 'selected' : ''}}>{{$item_sub->name}}</option>
                        @endforeach
                      </select>
                      <div class="invalid-feedback">Please enter the service category!</div>
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="price" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" value="{{$service->price}}" required>
                    <div class="invalid-feedback">Please enter the price!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="heading" class="col-sm-2 col-form-label">Heading</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="heading" name="heading" value="{{$service->heading}}" required>
                    <div class="invalid-feedback">Please enter the heading!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="heading" class="col-sm-2 col-form-label">Brief Decription</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" required>{{$service->description}}</textarea>
                    <div class="invalid-feedback">Please enter the description!</div>
                  </div>
                </div>

                <div class="row mb-5 pb-5">
                  <label for="heading" class="col-sm-2 col-form-label">Content</label>
                  <div class="col-sm-10">
                  <div id="content-editor">{!! $service->content !!}</div>
                    <div class="invalid-feedback">Please enter the content!</div>
                  </div>
                </div>

                <div class="row mt-5 mb-3">
                  <label for="image" class="col-sm-2 col-form-label">Image Upload</label>
                  <div class="col-sm-10">
                  <img src="{{url('service/'.$service->image)}}" class="mb-3" style="max-width:100%" alt="Profile">
                    <input class="form-control" type="file" id="image" name="image" >
                    <div class="invalid-feedback">Please enter the image!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="icon" class="col-sm-2 col-form-label">Icon Upload</label>
                  <div class="col-sm-10">
                  <img src="{{url('service/'.$service->icon)}}" class="mb-3" style="max-width:100%" alt="Profile">
                    <input class="form-control" type="file" id="icon" name="icon" >
                    <div class="invalid-feedback">Please enter the icon!</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Active</label>
                  <div class="col-sm-10">
                      <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active"  {{$service->active == 1 ? 'checked' : ''}}>
                      </div>
                      <div class="invalid-feedback">Please enter the active!</div>
                  </div>
                </div>

                <hr />
                <div class="col-sm-12">
                  <div class="row mb-3" style="justify-content:space-between;align-items:center;">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <h5 class="card-title">Documents Required</h5>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12" style="text-align:right;">
                      <button type="button" class="btn btn-warning btn-sm" onclick="newDOC()" style="display:inline;">Add Another Document</button>
                    </div>
                  </div>
                </div>

                <div id="doc-section">
                  @if($service->ServiceDocument->count() > 0)
                  @foreach ($service->ServiceDocument as $service_document)
                  <div id="doc-row-{{$service_document->id}}">
                    <div class="row mb-3">
                      <label for="document" class="col-sm-2 col-form-label">Document Name</label>
                      <div class="col-sm-10 mb-3">
                        <input type="text" class="form-control" name="document[]" value="{{$service_document->document}}" required>
                        <div class="invalid-feedback">Please enter the document name!</div>
                      </div>
                      <div class="col-sm-12 mb-3" style="text-align:right;">
                        <button type="button" class="btn btn-danger btn-sm" onClick="delDoc('doc-row-{{$service_document->id}}')" style="display:inline;">Delete Document</button>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @else
                  <div class="row mb-3">
                    <label for="document" class="col-sm-2 col-form-label">Document Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="document" name="document[]" required>
                      <div class="invalid-feedback">Please enter the document name!</div>
                    </div>
                  </div>
                  @endif
                </div>

                <hr />
                <h5 class="card-title">Features</h5>

                <div class="row mb-5 pb-5">
                  <label for="feature_content" class="col-sm-2 col-form-label">Content</label>
                  <div class="col-sm-10">
                  <div id="feature_content">{!! $service->feature !!}</div>
                    <div class="invalid-feedback">Please enter the content!</div>
                  </div>
                </div>

                <hr />
                <div class="col-sm-12">
                  <div class="row mb-3" style="justify-content:space-between;align-items:center;">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <h5 class="card-title">FAQ</h5>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12" style="text-align:right;">
                      <button type="button" class="btn btn-warning btn-sm" id="cloneFaq" onclick="newFAQ()" style="display:inline;">Add Another FAQ</button>
                    </div>
                  </div>
                </div>

                <div id="faq-section">
                @if($service->ServiceFaq->count() > 0)
                @foreach ($service->ServiceFaq as $service_faq)
                  <div id="clone-row-{{$service_faq->id}}">
                    <div class="row mb-3">
                      <label for="faq_question" class="col-sm-2 col-form-label">Question</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control " name="faq_question[]" value="{{$service_faq->faq_question}}" >
                        <div class="invalid-feedback">Please enter the question!</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="faq_answer" class="col-sm-2 col-form-label">Answer</label>
                      <div class="col-sm-10">
                        <textarea class="form-control"name="faq_answer[]" rows="5" required>{{$service_faq->faq_answer}}</textarea>
                        <div class="invalid-feedback">Please enter the answer!</div>
                      </div>
                    </div>
                    <div class="col-sm-12 mb-3" style="text-align:right;">
                      <button type="button" class="btn btn-danger btn-sm" onClick="delFaq('clone-row-{{$service_faq->id}}')" style="display:inline;">Delete FAQ</button>
                    </div>
                  </div>
                  @endforeach
                  @else
                  <div>
                    <div class="row mb-3">
                      <label for="faq_question" class="col-sm-2 col-form-label">Question</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control " id="faq_question" name="faq_question[]" required>
                        <div class="invalid-feedback">Please enter the question!</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="faq_answer" class="col-sm-2 col-form-label">Answer</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="faq_answer[]" name="faq_answer[]" rows="5" required></textarea>
                        <div class="invalid-feedback">Please enter the answer!</div>
                      </div>
                    </div>
                  </div>
                  @endif
                </div>

                

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        

        </div>
      </div>
    </section>

    @stop

    @section('javascript')
    @include('admin.pages.javascript.post_js')
    @include('admin.pages.javascript.validation_js')
    @include('admin.pages.javascript.error_js')
    @include('admin.pages.javascript.dynamic_faq_js')
    @include('admin.pages.javascript.dynamic_doc_js')
      <script>
        var quill = new Quill('#content-editor', {
          theme: 'snow',
          placeholder: 'Compose here...',
        });
        var quill2 = new Quill('#feature_content', {
          theme: 'snow',
          placeholder: 'Compose here...',
        });
        

          function formHandler(e){
            e.preventDefault();
            

            let title = document.getElementById('title').value
            if(!(textValidation(title, 'title'))){return false;}
            let price = document.getElementById('price').value
            if(!(numberValidation(price, 'price'))){return false;}
            let description = document.getElementById('description').value
            if(!(textValidation(description, 'description'))){return false;}
            let service_category_id;
            try {
              service_category_id = document.getElementById('service_category_id').value || null
            } catch (error) {
              service_category_id = null
            }
            if(!(selectValidation(service_category_id, 'service category'))){return false;}
            let service_sub_category_id; 
            try {
              service_sub_category_id = document.getElementById('service_sub_category_id').value || null
            } catch (error) {
              service_sub_category_id = null
            }
            if(!(selectValidation(service_sub_category_id, 'service sub-category'))){return false;}
            let heading = document.getElementById('heading').value
            if(!(textValidation(heading, 'heading'))){return false;}
            let content = quill.root.innerHTML;
            console.log(content);
            if(!(contentValidation(content, 'content'))){return false;}
            let image = document.getElementById('image').files[0]
            if(!(imageValidation(image, 'image'))){return false;}
            let icon = document.getElementById('icon').files[0]
            if(!(imageValidation(icon, 'icon'))){return false;}
            let active = document.getElementById('flexSwitchCheckChecked').value
            let feature = quill2.root.innerHTML;
            if(!(contentValidation(feature, 'feature'))){return false;}

            let docs = document.getElementsByName('document[]')
            let faq_answer = document.getElementsByName('faq_answer[]')
            let faq_question = document.getElementsByName('faq_question[]')
            let _token = document.getElementsByName('_token')[0].value
            
            for (var i = 0; i < docs.length; i++) {
              if(!(textValidation(docs[i].value, 'document'))){
                return false;
                continue;
              }
            }
            for (var i = 0; i < faq_question.length; i++) {
              if(!(textValidation(faq_question[i].value, 'faq question'))){
                return false;
                continue;
              }
            }
            for (var i = 0; i < faq_answer.length; i++) {
              if(!(textValidation(faq_answer[i].value, 'faq answer'))){
                return false;
                continue;
              }
            }

            let formData = new FormData()
            formData.append('title',title)
            formData.append('price',price)
            formData.append('service_category_id',service_category_id)
            formData.append('service_sub_category_id',service_sub_category_id)
            formData.append('heading',heading)
            formData.append('description',description)
            formData.append('content',content)
            formData.append('image',image)
            formData.append('icon',icon)
            formData.append('active',active)
            formData.append('feature',feature)
            for (var i = 0; i < docs.length; i++) {
              if(!(textValidation(docs[i].value, 'document'))){
                return false;
                continue;
              }else{
                formData.append('document[]',docs[i].value)
              }
            }
          
            for (var i = 0; i < faq_answer.length; i++) {
              if(!(textValidation(faq_answer[i].value, 'faq answer'))|| !(textValidation(faq_question[i].value, 'faq question'))){
                return false;
                continue;
              }else{
                formData.append('faq_question[]',faq_question[i].value)
                formData.append('faq_answer[]',faq_answer[i].value)
              }
            }
            formData.append('_token',_token)

            postData("{{route('service_copy_ajax',$service->id)}}", formData)
              .then(data => {
                  // console.log(data); // JSON data parsed by `data.json()` call

                  if(data?.error?.image){
                    errorCheck(data?.error?.image)
                    return;
                  }

                  if(data?.error?.icon){
                    errorCheck(data?.error?.icon)
                    return;
                  }

                  if(data?.error?.title){
                    errorCheck(data?.error?.title)
                    return;
                  }

                  if(data?.error?.service_category_id){
                    errorCheck(data?.error?.service_category_id)
                    return;
                  }

                  if(data?.error?.service_sub_category_id){
                    errorCheck(data?.error?.service_sub_category_id)
                    return;
                  }

                  if(data?.error?.price){
                    errorCheck(data?.error?.price)
                    return;
                  }

                  if(data?.error?.heading){
                    errorCheck(data?.error?.heading)
                    return;
                  }

                  if(data?.error?.content){
                    errorCheck(data?.error?.content)
                    return;
                  }

                  if(data?.error?.feature){
                    errorCheck(data?.error?.feature)
                    return;
                  }

                  if(data?.error?.document){
                    errorCheck(data?.error?.document)
                    return;
                  }


                  if(data?.error?.faq_question){
                    errorCheck(data?.error?.faq_question)
                    return;
                  }

                  if(data?.error?.faq_answer){
                    errorCheck(data?.error?.faq_answer)
                    return;
                  }

                  if(data?.success){
                    tata.success('Success', 'Data stored successfully', {
                          duration: 10000,
                          animate: 'slide',
                    })
                  }

              })
          }


          let serviceCategory = document.getElementById('service_category_id');
          serviceCategory.addEventListener('change',getServiceSubCategory)
          function getServiceSubCategory(){
            document.getElementById('loader').style.display='grid'
            if(serviceCategory.value == null || serviceCategory.value == 'null'){
              let ssc = document.getElementById('service-sub-category-parent');
              ssc.innerHTML=""
            }else{
              fetch("{{url('/')}}/admin/service-sub-category/ajax-view/"+serviceCategory.value)
              .then(response => response.json())
              .then((data) => {
                let arr = '';
                data.service_sub_category.map((item)=>{
                  arr+=`<option value="${item.id}">${item.name}</option>`
                })
                let ssc = document.getElementById('service-sub-category-parent');
                ssc.innerHTML=""
                let elem = `
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="service_sub_category_id">Service Sub-Category</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="service_sub_category_id" name="service_sub_category_id" required>
                      <option value="null">Open this select menu</option>
                      ${arr}
                    </select>
                    <div class="invalid-feedback">Please enter the service sub-category!</div>
                  </div>
                </div>
                `
                var div1 = document.createElement('div');
                div1.innerHTML = elem
                ssc.append(div1);
              })
              .catch((error) => console.log(error));
            }
            
            document.getElementById('loader').style.display='none'
          }

        
      </script>
    @stop
    