// 进入动画
function tran_animate(kind,targetUrl,windowHeight=window.innerHeight,windowWidth=window.innerWidth) {
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
//浮入浮出动画
function fade(element, inOrOut = 'in',translateY = 20, duration = 100) {
  element.style.visibility = 'visible'; // 确保元素是可见的
  if (inOrOut === 'in') {
    anime({
      targets: element,
      opacity: [0, 1], // 从完全透明到完全不透明
      translateX: ['-50%', '-50%'],
      translateY: [-translateY, 0], 
      duration: duration, // 动画持续时间，单位为毫秒
      easing: 'easeInOutQuad', // 动画缓动函数
    });
  } else {
    anime({
      targets: element,
      opacity: [1, 0], // 从完全不透明到完全透明
      translateX: ['-50%', '-50%'],
      translateY: [0, -translateY],
      duration: duration, // 动画持续时间，单位为毫秒
      easing: 'easeInOutQuad', // 动画缓动函数
      complete: function(anim) {
        element.style.visibility = 'hidden'; // 动画结束后隐藏元素
      }
    });
  }
}


window.onload = function() {
  // 进入动画
  setTimeout(function() {
    document.querySelector('.tranAniContatiner').style.background = 'rgba(0, 0, 0, 0)';
  }, 0);
  tran_animate('in', '');
};

// 页面初始化动画
function initializeAnimations() {
  const fadeElements = document.querySelectorAll('.fadein');
  let count = 0;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        if (count < 4) { // 只为前三个元素设置延迟
          const delay = count * 0.5; // 延迟递增，每个0.5秒
          entry.target.style.animationDelay = `${delay}s`;
        }
        entry.target.classList.add('start');
        observer.unobserve(entry.target);
        count++;
      }
    });
  }, {
    rootMargin: '50px',
    threshold: 0.1
  });

  fadeElements.forEach(element => {
    observer.observe(element);
  });
}

document.addEventListener('DOMContentLoaded', (event) => {
  initializeAnimations();
  
  // 导航栏折叠动画
    //悬停在可折叠标签上时腾出空间及添加浮入浮出动画
  var elements = document.getElementsByClassName('deployable');
  for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('mouseenter', function() {
      document.querySelector('.content').style.transform = 'translateY(16rem)';
      fade(this.querySelector('.submenu'),'in');
    });
    elements[i].addEventListener('mouseleave', function() {
      document.querySelector('.content').style.transform = 'translateY(0)';
      fade(this.querySelector('.submenu'),'out');
    });
  }

  //网页切换动画
  var tranAni = document.getElementsByClassName('nextPageLink');
  Array.from(tranAni).forEach(function(element) {
    // 为每个元素添加点击事件监听器
    element.addEventListener('click', function(event) {
      event.preventDefault(); // 阻止链接的默认跳转行为
      const targetUrl = this.getAttribute('href'); // 获取目标页面的URL
      tran_animate('out', targetUrl); // 执行退出动画
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



function addSectorToCorner(elementSelector, corner, size) {
  // 查询目标元素列表
  const elements = document.querySelectorAll(elementSelector);
  if (elements.length === 0) {
    console.error('指定的元素未找到');
    return;
  }

  elements.forEach(element => {
    // 创建 SVG 元素
    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttribute("width", size);
    svg.setAttribute("height", size);
    svg.style.position = 'absolute';
    svg.style.zIndex = '-1';

    // 通过函数绘制不同扇形
    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
    let d = '';

    // 根据角落位置调整 SVG 定位
    switch (corner.toLowerCase()) {
      case '左上':
        svg.style.top = '0';
        svg.style.left = '0';
        d = `M 0 0 L ${size} 0 A ${size} ${size} 0 0 1 0 ${size} Z`;
        break;
      case '右上':
        svg.style.top = '0';
        svg.style.right = '0';
        d = `M ${size} 0 L ${size} ${size} A ${size} ${size} 0 0 1 0 0 Z`;
        break;
      case '左下':
        svg.style.bottom = '0';
        svg.style.left = '0';
        d = `M 0 ${size} L 0 0 A ${size} ${size} 0 0 1 ${size} ${size} Z`;
        break;
      case '右下':
        svg.style.bottom = '0';
        svg.style.right = '0';
        d = `M ${size} ${size} L 0 ${size} A ${size} ${size} 0 0 1 ${size} 0 Z`;
        break;
      default:
        console.error('未知的角落位置');
        return;
    }

    // 设置路径属性
    path.setAttribute("d", d);
    path.setAttribute("fill", "#B71C1C"); // 或者使用具体的颜色代码

    // 将路径添加到 SVG 并将 SVG 添加到目标元素
    svg.appendChild(path);
    element.style.position = 'relative'; // 确保父元素能够容纳绝对定位的 SVG
    element.appendChild(svg);
  });
}


//平滑回到原位置
transToOrigin = function(element_id, duration = 1000) {
  anime({
    targets: element_id,
    rotateX: 0,
    rotateY: 0,
    translateX: 0,
    translateY: 0,
    duration: duration,
    easing: 'easeOutExpo'
  });
};

//制造透视效果
function perspective(container_id, mask_id) {
  const container = document.getElementById(container_id);
  const mask = document.getElementById(mask_id);

  function applyEffect(e) {
    const bounds = container.getBoundingClientRect();
    const x = e.clientX - bounds.left - bounds.width / 2;
    const y = e.clientY - bounds.top - bounds.height / 2;

    const rotateX = y / bounds.height * 30; // 控制旋转角度
    const rotateY = x / bounds.width * -30; // 控制旋转角度

    const parallaxX = x / bounds.width * 30; // 控制视差移动距离
    const parallaxY = y / bounds.height * 30; // 控制视差移动距离

    anime({
      targets: container,
      rotateX: rotateX,
      rotateY: rotateY,
      duration: 300, // 可以调整动画时间来优化平滑效果
      easing: 'easeOutExpo'
    });

    anime({
      targets: mask,
      translateX: parallaxX,
      translateY: parallaxY,
      duration: 300, // 保持和容器相同的动画时间
      easing: 'easeOutExpo'
    });
  }
  container.addEventListener('mouseenter', applyEffect);
  container.addEventListener('mousemove', applyEffect);
  container.addEventListener('mouseleave', function() {
    transToOrigin(`#${container_id}`);
    transToOrigin(`#${mask_id}`);  
  });
};


//在box中绘制斜线
function drawSlashes(classname, stoke_color = "#ffca28", line_tensity=60){
  const containers = document.querySelectorAll(`.${classname}`);
  containers.forEach(container => {
    const existingSvg = container.querySelector('svg');
    if (existingSvg) {
      container.removeChild(existingSvg);
    }
    const width = container.offsetWidth;
    const height = container.offsetHeight;
    container.setAttribute("style", `position: relative; z-index: -2;`);
    svg = container.appendChild(document.createElementNS("http://www.w3.org/2000/svg", "svg"));
    svg.setAttribute("style", `display: block; position: absolute; top: 0; left: 0; z-index: -1; width: 100%; height: 100%;`);
    let lineCount = Math.ceil(width / line_tensity) ;
    let spacing = (height + width) * 1.1 / lineCount;
    let length_projected = height ;
    let strokeWidth = spacing / 3;
    let offset = strokeWidth / 2;
    
    for(let i = 0; i < lineCount; i++){
        let line = document.createElementNS("http://www.w3.org/2000/svg", "line");
        line.setAttribute("x1", String(offset + i*spacing));
        line.setAttribute("y1", String(-offset));
        line.setAttribute("x2", String(-offset + i*spacing - length_projected));
        line.setAttribute("y2", String(offset + length_projected));
        line.setAttribute("stroke", `${stoke_color}`);
        line.setAttribute("stroke-width", String(strokeWidth));
        svg.appendChild(line);
      }
  });
}

//搜索函数
function submitSearch(current_page, input, div_id) {
  const url = `../includes/search.php?current_page=${encodeURIComponent(current_page)}&key_words=${encodeURIComponent(input.value)}`;
  fetch(url)
  .then(response => response.text())
  .then(html => {
    const results = document.getElementById(div_id);
    results.innerHTML = html; // 直接设置 HTML 内容
    initializeAnimations(); // 重新初始化动画效果
})
  .catch(error => console.error('Error:', error));
}

//searchButton展开成搜索框
function initializeSearch(current_page, div_id) {
  const searchButton = document.getElementById('searchButton');
  const searchIcon = document.getElementById('searchIcon');
  const searchInput = document.getElementById('searchInput');

  iconSearch = function() {
    submitSearch(current_page, searchInput, div_id);
  }
  searchButton.addEventListener('click', function firstClick() {
    searchButton.id = 'searchButtonFocus';

    // 移除初次点击的事件处理器
    searchButton.removeEventListener('click', firstClick);

    // 添加新的点击事件处理器以执行搜索
    searchIcon.addEventListener('click', iconSearch);
    searchInput.addEventListener('keyup', function(event) {
      if (event.key === 'Enter') {
        submitSearch(current_page, searchInput, div_id);
      }
    });

    // 添加全局点击事件监听器来检测点击外部区域
    function globalClickListener(event) {
      if (event.target.id !== 'searchButtonFocus' && event.target.id !== 'searchIcon' && event.target !== searchInput) {
        searchButton.id = 'searchButton';
        document.removeEventListener('click', globalClickListener);
        searchButton.addEventListener('click', firstClick);
        searchIcon.removeEventListener('click', iconSearch);
      }
    }
    document.addEventListener('click', globalClickListener);
  });
}

//点击页面其他位置时收回成搜索按钮
