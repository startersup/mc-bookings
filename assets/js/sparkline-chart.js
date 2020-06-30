function findClosest(target, tagName) {
    if (target.tagName === tagName) {
      return target;
    }
  
    while ((target = target.parentNode)) {
      if (target.tagName === tagName) {
        break;
      }
    }
  
    return target;
  }
  

  
  var options = {
    onmousemove(event, datapoint) {
      var svg = findClosest(event.target, "svg");
      var tooltip = svg.nextElementSibling;
      var date = (new Date(datapoint.date)).toUTCString().replace(/^.*?, (.*?) \d{2}:\d{2}:\d{2}.*?$/, "$1");
  
  
      tooltip.hidden = false;
      tooltip.textContent = `${date}: $${datapoint.value.toFixed(2)} USD`;
      tooltip.style.top = `${event.offsetY}px`;
      tooltip.style.left = `${event.offsetX + 20}px`;
    },
  
    onmouseout() {
      var svg = findClosest(event.target, "svg");
      var tooltip = svg.nextElementSibling;
  
      tooltip.hidden = true;
    }
  };
  
 