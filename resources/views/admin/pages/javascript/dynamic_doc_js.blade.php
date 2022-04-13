<script>
    var docCount = 1;

function newDOC(){
  var elem = `
  <div class="row mb-3">
    <label for="document" class="col-sm-2 col-form-label">Document Name</label>
    <div class="col-sm-10 mb-3">
      <input type="text" class="form-control" id="document${docCount}" name="document[]" required>
      <div class="invalid-feedback">Please enter the document name!</div>
    </div>
    <div class="col-sm-12 mb-3" style="text-align:right;">
      <button type="button" class="btn btn-danger btn-sm delete_faq" onClick="delDoc('doc-row-${docCount}')" style="display:inline;">Delete Document</button>
    </div>
  </div>
  `;
  var div1 = document.createElement('div');
  div1.id = "doc-row-"+docCount;
  div1.innerHTML = elem
  docCount++;
  document.getElementById('doc-section').append(div1);
}

function delDoc(id){
  var ele = document.getElementById(id);
  var parentEle = document.getElementById('doc-section');
  parentEle.removeChild(ele);
}

</script>