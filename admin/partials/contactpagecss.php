<style>
    .contactcards{
        
        width:100%;
        margin:auto;
        
        
    }
    .cntcrd{
        
        width: 28%;
        height:45%;
        padding: 1%;
        margin:1%;
        background-color:#ebebeb;
        border-radius: 10px;
        display: block;
        float:left;
        box-shadow: 5px 10px #888888;
        
    }
    #vm{
        background-color: #BC986A;
        border:none;
        padding:2%;
        border-radius: 5px;
        cursor: pointer;

    }
    .contactbut{
        width:90%;
        margin: auto;
    }
    #processed{
        background-color: #7bed9f;
        border:none;
        padding:2%;
        border-radius: 5px;
        cursor: pointer;
    }
    #rejected{
        background-color: #df6571;
        border:none;
        padding:2%;
        border-radius: 5px;
        cursor: pointer;
    }
    .viewmessage{
        width: 100%;
        
        background-color: rgba(0,0,0,0.7);
        top:0;
        bottom:0;
        display: none;
        justify-content: center;
        align-items: center;
        position: absolute;
    }
    .rejmessage{
        width: 100%;
        
        background-color: rgba(0,0,0,0.7);
        top:0;
        bottom:0;
        display: none;
        justify-content: center;
        align-items: center;
        position: absolute;
    }
    .showmessage{
            width: 20%;
            
            background-color: white;
            padding: 1%;
            border-radius: 10px;
            text-align: center;
            font-family: 'open-sans', sans-serif;
            margin: 1%;
            color: #535353;
            position: relative;
        
            
        }
        #closeicon{
            float:right;
            position: absolute;
            top:0;
            right: 0;
            font-weight: bold;
            font-size: 3em;
            transform: rotate(45deg);
            cursor: pointer;
            color: black;
            
        }
        .pages-btn{
            width:100%;
            margin: auto;
            
            text-align:center;
            margin-top: 1%;
            margin-bottom: 2%;
            
            
            
         }
         .pages-btn a{
            margin: 5px;
            padding: 3px;
            text-decoration: none;
            border: 3px solid #659DBD;
            border-radius: 30px;
            color: white;
            background-color:  #659DBD;
            font-family: 'Open Sans', sans-serif;
            

            
        }
        .page_active {
            text-decoration: none;
            color: #ead9be;
            font-family: 'Open Sans', sans-serif;
        }
        .conmenu{
            text-align: center;
            background-color: #659DBD;
            width: 30%;
            margin: auto;
            padding:0.7%;
            border-bottom-left-radius:50px ;
            border-bottom-right-radius:50px ;
        }
        .conmenu ul li{
            display:inline;
            padding:1%;
        }
</style>
<script>
        function admincon() {
        document.getElementsByClassName("viewmessage")[0].style.display = "flex";
        var id = document.getElementById('id').value;
        var msg = document.getElementById('msg').value;
        document.getElementById("msgshow").innerHTML = msg;
       
        
    }
    function conclosefunction() {
        document.getElementsByClassName("viewmessage")[0].style.display = "none";
        
    }
   

</script>