/* 页面 全屏-添加 */
function o2o_edit(title,url)
{
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/* 添加或编辑缩小的屏幕 */
function o2o_s_edit(title,url,w,h)
{	
	layer_show(title,url,w,h);
}

/* 删除 */
function o2o_del(id,url)
{
	layer.confirm('确认要删除吗？',function(index){
		window.localtion.href = url;
	});
}
