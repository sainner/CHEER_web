// 进入动画
function animate(kind,targetUrl,windowHeight=window.innerHeight,windowWidth=window.innerWidth) {
    const svgNS = "http://www.w3.org/2000/svg";
    const container = document.querySelector('.tranAniContatiner svg');
    
    let lineCount = Math.ceil(windowWidth / 60) ; // 根据窗口高度动态计算线条数量
    let spacing = (windowHeight+windowWidth) * 1.1 / lineCount; // 计算间距
    let stretch = windowWidth * 1.2; // 使用窗口宽度作为伸缩距离
    let maxStrokeWidth = spacing; // 最大线条宽度
    let minStrokeWidth = 2; // 最小线条宽度
    if (kind === 'in') {
      for (let i = 0; i < lineCount; i++) {
          let line = document.createElementNS(svgNS, "line");
          line.setAttribute("x1", String(-maxStrokeWidth));
          line.setAttribute("y1", String(i * spacing));
          line.setAttribute("x2", String(stretch));
          line.setAttribute("y2", String(i * spacing - stretch));
          line.setAttribute("stroke", "#212121");
          line.setAttribute("stroke-width", String(maxStrokeWidth));
          line.setAttribute("stroke-linecap", "round");
          container.appendChild(line);
          
          anime({
              targets: line,
              strokeWidth: [maxStrokeWidth, 0], // 从宽到窄
              easing: 'easeInOutSine',
              duration: 1000,
              complete: function(anim) {
                  line.parentNode.removeChild(line);
              }
          });
      }
    }
    else if (kind === 'out') {
      for (let i = 0; i < lineCount; i++) {
        let line = document.createElementNS(svgNS, "line");
        line.setAttribute("x1", String(-maxStrokeWidth));
        line.setAttribute("y1", String(i * spacing + maxStrokeWidth));
        line.setAttribute("x2", String(-maxStrokeWidth)); // 初始状态为 0 长度
        line.setAttribute("y2", String(i * spacing + maxStrokeWidth));
        line.setAttribute("stroke", "#212121");
        line.setAttribute("stroke-width", String(minStrokeWidth));
        line.setAttribute("stroke-linecap", "round");
        container.appendChild(line);
    
        anime({
            targets: line,
            x2: [-maxStrokeWidth, stretch], // 使用stretch变量动态设置终点x坐标
            y2: [i * spacing + maxStrokeWidth, i * spacing - stretch], // 根据间距和stretch调整终点y坐标
            strokeWidth: [minStrokeWidth, maxStrokeWidth], // 动态改变线条宽度
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
    }
}

window.onload = function() {
  // 进入动画
  setTimeout(function() {
    document.querySelector('.tranAniContatiner').style.background = 'rgba(0, 0, 0, 0)';
  }, 0);
  animate('in', '');
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
      animate('out', targetUrl); // 执行退出动画
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