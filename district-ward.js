function random_function()
{
    var province=document.getElementById("country").value;

    if(province==="province1")
    {
        var district=["Select","Kathmandu","Pokhara"];
    }
    else if(province==="USA")
    {
        var district=["Select","Texas","NewYork"];
    }
    
 
    var string="";
 
    for(i=0;i<district.length;i++)
    {
        string=string+"<option value="+district[i]+">"+district[i]+"</option>";
    }
    string = "<select>"+string+"</select>";
    document.getElementById("district").innerHTML=string;

    console.log(string);
}

function random_function2()
{
var district=document.getElementById("district").value;

console.log(district);
console.log(district.length);

if (district === "Kathmandu"){

var ward = ["one", "two", "three"];

}
else{
var ward = ["zero", "one", "two", "three"];
console.log(ward);
}

var string2="";

for (j=0; j<ward.length; j++){
console.log("ktm");
string2 = string2+"<option value="+ward[j]+">"+ward[j]+"</option>";
}
string2 = "<select>"+string2+"</select>";
document. getElementById("outputw").innerHTML=string2;
}