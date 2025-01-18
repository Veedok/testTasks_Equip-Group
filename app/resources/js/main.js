let list = document.getElementsByTagName('button');

function showThis(target){
    var index;
    for(var i=0;i<list.length;i++){
        if(list[i] === target) index = i;
    }
    console.log(target + index + 'clicked');
}
