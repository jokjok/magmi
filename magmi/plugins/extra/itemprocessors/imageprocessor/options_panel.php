<div class="plugin_description">
This plugin is the new image importing feature of magmi.
It enables image renaming from input value with some dynamic values coming from input values.
</div>

<div class="formline">
<span>Read local images from:</span><input type="text"  name="IMG:sourcedir" size="80" value="<?php echo $this->getParam("IMG:sourcedir","media/import")?>"></input>
<div class="fieldinfo">if relative path is used, it means "relative to magento base dir",absolute path is used as is</div>
</div>
<div class="formline ifield">
<span>Image Renaming:</span><input type="text"  name="IMG:renaming" size="80" value="<?php echo $this->getParam("IMG:renaming")?>"></input>
<div class="fieldhelp"></div>
<div class="fieldinfo">
Leave blank to keep original image name.
<div class="fieldsyntax" style="display:none">
<ul>
<li>You can use "dynamic variables" to fill this field.</li>
<li>{item.[some item field]}  and {magmi.[store|imagename|imagename.noext|imagename.ext|attr_code]} are supported.</li>
<li>{item.sku}.jpg  : will create an image with item sku value as name and a jpg extension.</li>
<li>{item.sku}_{magmi.store}.jpg : this is a little trickier.<br/>
if you've got 5 stores,i will create 5 different copies of the input image &amp; force the name to be [item sku]_[store id].jpg for each copy.</li>
<li>{item.sku}_{magmi.imagename.noext}_{magmi.attr_code}.jpg, will create [sku]_[image name without extension]_[column name].jpg magento filename.</li>
</ul>
</div>
</div>
</div>
<div class="formline">
<span>Image import mode</span>
<?php $iwm=$this->getParam("IMG:writemode","keep");?>
<select name="IMG:writemode">
<option value="keep" <?php if($iwm=="keep"){?>selected="selected"<?php }?>>Keep existing images</option>
<option value="override" <?php if($iwm=="override"){?>selected="selected"<?php }?>>Override existing images</option>
</select>
<span>Assign only existing images</span>
<select name="IMG:existingonly">
<?php $existonly=$this->getParam("IMG:existingonly","no");?>
<option value="yes" <?php if($existonly=="yes"){?>selected="selected"<?php }?>>Yes</option>
<option value="no" <?php if($existonly=="no"){?>selected="selected"<?php }?>>No</option>
</select>
</div>
<div class="formline">
<span>Pre-download check for remote images</span>
<select name="IMG:predlcheck">
<?php $qdlc=$this->getParam("IMG:predlcheck","yes");?>
<option value="yes" <?php if($qdlc=="yes"){?>selected="selected"<?php }?>>Enable</option>
<option value="no" <?php if($qdlc=="no"){?>selected="selected"<?php }?>>Disable</option>
</select>
</div>
<ul class="formline">
	<li class="label">Change attributes on image error</li>
	<li class="value"><input type="text" id="IMG:err_attrlist" name="IMG:err_attrlist" size="80" value="<?php echo $this->fixListParam($this->getParam("IMG:err_attrlist"))?>" onblur="img_mf.buildparamlist()"></input></li>
</ul>
<div id="IMG:err_attrsetup">
</div>
<script type="text/javascript">
var img_vals=<?php echo tdarray_to_js($this,'IMG:err_attrlist','IMG_ERR')?>;
var img_linetpl='<ul class="formline"><li class="label">set {fieldname} as</li><li class="value"><input type="text" name="IMG_ERR:{fieldname.enc}" value="{value}"></input></li></ul>';
img_mf=new magmi_multifield('IMG:err_attrlist','IMG:err_attrsetup',img_linetpl,img_vals);
img_mf.buildparamlist();
</script>

