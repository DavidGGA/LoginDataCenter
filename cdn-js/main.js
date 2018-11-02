
function f(d, id) {
    var b, s, fid = id + '-pixel';
    if (d.getElementById(fid)) {
        return;
    }
    b = d.getElementsByTagName('body')[0];
    //Call to get code by ID
    s = gcbi(id);
    if (!s) {
        return;
    }
  	for (var i in s){
      //acá deberia crear un script para c/u de las URL que encuentre asociadas al cliente.
      //console.log("URL "+j+" "+data[i][j]);
      p = d.createElement('img');
      p.id = fid + '-' + i;
      p.height = 1;
      p.width = 1;
      p.border = 0;
      p.src = s[i];
      console.log(p);
      b.insertBefore(p, b.firstChild);
    }
}

/*function get code by id*/
function gcbi(id){
	data = {
		'cliente1': ['http://bcp.crwdcntrl.net/5/c=12293/b=49471353'],
		'cliente2': ['https://p1.zemanta.com/p/1394/1820/'],
		'cliente1': ['https://p1.zemanta.com/p/1394/1821/'],
		'Seguro_DBM':['https://p1.zemanta.com/p/1394/1820/','https://p1.zemanta.com/p/1394/1821/','https://p1.zemanta.com/p/1521/1882/']
	};
	if(typeof data[id] == 'undefined')return false;
	console.log("Sera " + Array.isArray(data));
	return data[id];
}