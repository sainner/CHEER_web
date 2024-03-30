window.onload = function() {
  // 进入动画
  setTimeout(function() {
    document.querySelector('.tranAniContatiner').style.background = 'rgba(0, 0, 0, 0)';
    const svgNS = "http://www.w3.org/2000/svg";
    const container = document.querySelector('.tranAniContatiner svg');
    let lineCount = 45;
    let spacing = 60; // 间距
    let stretch = 2000; // 伸缩距离
    
    for (let i = 0; i < lineCount; i++) {
      let line = document.createElementNS(svgNS, "line");
      line.setAttribute("x1", "0");
      line.setAttribute("y1", String(i * spacing));
      line.setAttribute("x2", String(stretch));
      line.setAttribute("y2", String(i * spacing - stretch));
      line.setAttribute("stroke", "#212121");
      line.setAttribute("stroke-width", "55"); // 初始宽度为宽
      line.setAttribute("stroke-linecap", "round");
      container.appendChild(line);
      
      anime({
        targets: line,
        /*
        x1: [0, stretch], // 从设定的伸缩距离变为0
        y1: [i * spacing, -stretch + i * spacing], // 使线条长度变为0
        */
        strokeWidth: [55, 0], // 从宽到窄
        easing: 'easeInOutSine',
        duration: 1000,
        complete: function(anim) {
          line.parentNode.removeChild(line);
        }
      });
    }
  }, 0);
};


document.addEventListener('DOMContentLoaded', (event) => {
  //切换新闻内容
  const divs = Array.from(document.getElementsByClassName('news'));
  const footerDiv = document.querySelector('footer div');
  divs.forEach(div => {
    div.addEventListener('click', function() {
      // 移除所有 div 的 'active' 类
      divs.forEach(d => d.classList.remove('active'));

      // 为点击的 div 添加 'active' 类
      this.classList.add('active');
      if (this.id === 'news_03' || this.id === 'news_04') {
        // 修改 footer 的样式
        footerDiv.style.justifyContent = 'flex-start';
      } else {
        // 恢复 footer 的默认样式
        footerDiv.style.justifyContent = '';
      }
    });
  });

    //悬停在可折叠标签上时增加.content上的margin
  var elements = document.getElementsByClassName('deployable');
  for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('mouseover', function() {
        document.querySelector('.content').style.marginTop = '15rem';
    });
    elements[i].addEventListener('mouseout', function() {
        document.querySelector('.content').style.marginTop = '0';
    });
  }
  
  //网页退出动画
  var tranAni = document.getElementsByClassName('nextPageLink');
  Array.from(tranAni).forEach(function(element) {
    // 为每个元素添加点击事件监听器
    element.addEventListener('click', function(event) {
      event.preventDefault(); // 现在正确地阻止了链接的默认跳转行为
      const targetUrl = this.getAttribute('href'); // 获取目标页面的URL
      const svgNS = "http://www.w3.org/2000/svg";
      const container = document.querySelector('.tranAniContatiner svg');
      let lineCount = 45;
      let spacing = 60; // 间距
      let stretch = 2000; // 伸缩距离
      
      for (let i = 0; i < lineCount; i++) {
        let line = document.createElementNS(svgNS, "line");
        line.setAttribute("x1", "0");
        line.setAttribute("y1", String(i * spacing));
        line.setAttribute("x2", "0"); // 初始状态为 0 长度
        line.setAttribute("y2", String(i * spacing));
        line.setAttribute("stroke", "#212121");
        line.setAttribute("stroke-width", "2");
        line.setAttribute("stroke-linecap", "round");
        container.appendChild(line);
        anime({
          targets: line,
          x2: [0, stretch], // 假设视口的宽度
          y2: [i * spacing, -stretch + i * spacing], // 根据线条间距调整
          strokeWidth: [2, 60],
          easing: 'easeInOutSine',
          duration: 1000,
          complete: function(anim) {
            // 如果当前动画是最后一个线条的动画，则执行页面跳转
            if (i === lineCount - 1) {
              window.location.href = targetUrl;
            }
          }
        });
      }
    });
  }); 
});


// 禁用滚动的函数
function disableScroll() {
  // 保存当前页面的滚动位置
  window.scrollTo(0, 0);
  // 禁用滚动
  window.onscroll = function() {
      window.scrollTo(0, 0);
  };
}

// 启用滚动的函数
function enableScroll() {
    window.onscroll = function() {};
}

// 获取nav元素
var nav = document.querySelector('nav');

// 当鼠标进入nav时禁用滚动
nav.addEventListener('mouseenter', disableScroll);

// 当鼠标离开nav时启用滚动
nav.addEventListener('mouseleave', enableScroll);