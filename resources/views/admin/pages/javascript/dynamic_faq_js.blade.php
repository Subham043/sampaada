<script>
    var faqCount = 1;

function newFAQ(){
  var elem = `
    <div class="row mb-3">
      <label for="faq_question" class="col-sm-2 col-form-label">Question</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="faq_question${docCount}" name="faq_question[]" required>
        <div class="invalid-feedback">Please enter the question!</div>
      </div>
    </div>
    <div class="row mb-3">
      <label for="faq_answer" class="col-sm-2 col-form-label">Answer</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="faq_answer${docCount}" name="faq_answer[]" rows="5" required></textarea>
        <div class="invalid-feedback">Please enter the answer!</div>
      </div>
    </div>
    <div class="col-sm-12 mb-3" style="text-align:right;">
      <button type="button" class="btn btn-danger btn-sm delete_faq" onClick="delFaq('clone-row-${faqCount}')" style="display:inline;">Delete FAQ</button>
    </div>
  `;
  var div1 = document.createElement('div');
    div1.id = "clone-row-"+faqCount;
  div1.innerHTML = elem
  faqCount++;
  document.getElementById('faq-section').append(div1);
}

function delFaq(id){
  var ele = document.getElementById(id);
  var parentEle = document.getElementById('faq-section');
  parentEle.removeChild(ele);
}
</script>