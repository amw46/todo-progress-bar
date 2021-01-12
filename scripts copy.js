
function prog_bar(){
    var r = document.querySelector(':root');
    var percentVals = document.querySelectorAll('.percent'); //find all hidden inputs with percent class
    var valContainers= document.querySelectorAll('.val'); //find all value containers

    for (i=0; i<percentVals.length; i++) {
        var percent= percentVals[i].value;
        //var percent = 65;
        //console.log(percent);
        valContainers[i].innerHTML = "Progress made: " + percent + "%";
        elem = document.getElementById('progress-bar'+ (i+1).toString()); //get the element

        //console.log('progress-bar'+i.toString());
        //if percent within proper range, calc
        if (percent >= 0 && percent <= 100) {
            //r.style.setProperty('--bar-size-adj', "calc(500px *" + (percent/100) + ")");
            elem.style.setProperty('--bar-size-adj', "calc(500px *" + (percent/100) + ")"); //set the id style var rather than the root
            
            // r.style.setProperty('--color3', 'tomato' );
            // console.log(getComputedStyle(r).getPropertyValue('--color3'));

        }
        else {
            elem.style.setProperty('bar-size-adj', 0);
        }
        
        //console.log(getComputedStyle(document.documentElement).getPropertyValue('--bar-size-adj'));
        //based on percent value, choose the right css class
        switch(true) {

            case(percent >= 0 && percent <= 5):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-0') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-0");
                    // -> triggering reflow /* The actual magic */
            
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-0");
            }
            
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-0';
                break;
            case (percent > 5 && percent <= 10):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-10') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-10");
                    // -> triggering reflow /* The actual magic */
                
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                    
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-10");
                }
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-10';
                break;
            case (percent > 10 && percent <= 20):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-20') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-20");
                    // -> triggering reflow /* The actual magic */
                
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                    
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-20");
                }
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-20';
                break;
            case (percent > 20 && percent <= 30):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-30') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-30");
                    // -> triggering reflow /* The actual magic */
                
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                    
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-30");
                }
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-30';
                break;
            case (percent > 30 && percent <= 40):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-40') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-40");
                    // -> triggering reflow /* The actual magic */
                
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                    
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-40");
                }
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-40';
                break;
            case (percent > 40 && percent <= 50):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-50') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-50");
                    // -> triggering reflow /* The actual magic */
                
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                    
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-50");
                }
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-50';
                break;
            case (percent > 50 && percent <= 60):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-60') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-60");
                    // -> triggering reflow /* The actual magic */
                
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                    
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-60");
                }
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-60';
                break;
            case (percent > 60 && percent <= 70):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-70') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-70");
                    // -> triggering reflow /* The actual magic */
                
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                    
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-70");
                }
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-70';
                break;
            case (percent > 70 && percent <= 80):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-80') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-80");
                    // -> triggering reflow /* The actual magic */
                
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                    
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-80");
                }
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-80';
                break;
            case (percent > 80 && percent <= 90):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-90') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-90");
                    // -> triggering reflow /* The actual magic */
                
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                    
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-90");
                }
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-90';
                break;
            case (percent > 90 && percent <= 100):
                if (document.getElementById('progress-bar'+ (i+1).toString()).className === 'progress-bar-100') {
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.remove("progress-bar-100");
                    // -> triggering reflow /* The actual magic */
                
                    void document.getElementById('progress-bar'+ (i+1).toString()).offsetWidth;
                    
                    // -> and re-adding the class
                    document.getElementById('progress-bar'+ (i+1).toString()).classList.add("progress-bar-100");
                }
                document.getElementById('progress-bar'+ (i+1).toString()).className ='progress-bar-100';

                // if (percent == 100) { setTimeout(() => alert('You did it! 100%'), 2500); }
                break;   

            //for catching exceptions              
            default:
                alert('Please insert a valid percent value (1-100)');
                document.getElementById('progress-bar'+ (i+1).toString()).className ='';
                break;
        }

    }
    
    //console.log(percent);

            
}

function btn() {
    document.getElementById('color-change').className ='color';
}


function prog_bar2() {
    // Get the root element
    var r = document.querySelector(':root');
    var percent = document.getElementById('percent').value / 100; //get the percent value from text

    //set the property bar-size-test using javascript
    r.style.setProperty('--bar-size-test', "calc(1000px *" + percent + ")");
    // r.style.setProperty('--color', 'lightblue');
}
