 /*
 document.addEventListener("DOMContentLoaded", (event) => {
  gsap.registerPlugin(ScrollTrigger)
  gsap.utils.toArray(".memberBox");
  var tl = gsap.timeline({
    ease:"linear",
    scrollTrigger: {
      trigger: ".outputsContainer",
      start: "top 50%",
      end: "bottom 50%",
      scrub: 1,
      markers: true,
    }
  });
  tl.to(".memberBox",{x:"0vw", scale:1, opacity:1, filter:"none", boxShadow:"0 0 8rem rgba(0,0,0,0.2)", backdropFilter:"blur(0.2rem)", outline:"0.3rem solid $color2", outlinerOffset:"-0.3rem"});
  tl.to(".memberBox",{x:"7vw", scale:0.84, opacity:0.8, boxShadow:"0 0 8rem rgba(0,0,0,0.1)", backdropFilter:"none", outline:"0.1rem solid white", outlinerOffset:"-0.1rem"});
  tl.to(".memberBox",{x:"14vw", scale:0.68, opacity:0.6});
  tl.to(".memberBox",{x:"21vw", scale:0.52, opacity:0.4});
  tl.to(".memberBox",{x:"28vw", scale:0.36, opacity:0.2, filter:"none"});
  tl.to(".memberBox",{x:"35vw", scale:0, opacity:0, filter:"blur(1rem)"});
 });
 */
function displayEducation() {
  document.querySelector('.education').style.opacity = 1;
}
function removeEducation() {
  document.querySelector('.education').style.opacity = 0;
}
const education_op = window.getComputedStyle(document.querySelector('.education')).opacity; //获取初始的css样式表上的教育经历的透明度

//添加滚动动画的函数
function scrollAni(){
  const membersContainer = document.querySelector('.membersContainer');
  const memberBoxes = membersContainer.querySelectorAll('.memberBoxContainer');
  let n = 0; // 标记元素的初始索引

  const personalOutputs = document.querySelector('.personalOutputs');
  personalOutputs.addEventListener('wheel', function(event) {
    event.stopPropagation(); // 阻止事件向上冒泡
  }, {passive: false});

 // 初始化所有元素的样式
  initializeStyles();
  
  membersContainer.addEventListener('wheel', function(event) {
    // 阻止默认的滚动行为
    event.preventDefault();

    // 根据滚轮的方向更新索引n
    const direction = Math.sign(event.deltaY);
    n += direction;
    n = Math.max(0, Math.min(memberBoxes.length - 1, n)); // 保证n在有效范围内

    updateStyles(); // 更新所有元素的动画状态
    updateMemberContent(n); // 更新成员内容
  });
 
 // 初始化样式
  function initializeStyles() {
    memberBoxes.forEach((box, index) => {
      applyStyles(index, box);
    });
  }
 
 // 更新样式，用于滚轮事件
  function updateStyles() {
    memberBoxes.forEach((box, index) => {
      applyStyles(index, box);
    });
  }
 
 // 应用样式
  function applyStyles(index, element) {
    if (index < n) {
      setStyles(element, -7, 1.16, 0, '1rem', '0.1rem solid white', '-0.1rem', 20); // Corresponds to 0%
    } else if (index === n) {
      setStyles(element, 0, 1, 1, '0', '0.3rem solid #B71C1C', '-0.3rem', 19, 'selectedBox'); // Corresponds to 17% // 标记当前元素
    } else if (index === n + 1) {
      setStyles(element, 10, 0.8, 0.8, '0', '0.1rem solid white', '-0.1rem', 18); // Corresponds to 33%
    } else if (index === n + 2) {
      setStyles(element, 18, 0.62, 0.6, '0', '0.1rem solid white', '-0.1rem', 17); // Corresponds to 50%
    } else if (index === n + 3) {
      setStyles(element, 24, 0.48, 0.4, '0', '0.1rem solid white', '-0.1rem', 16); // Corresponds to 67%
    } else if (index === n + 4) {
      setStyles(element, 28, 0.36, 0.2, '0', '0.1rem solid white', '-0.1rem', 15); // Corresponds to 83%
    } else {
      setStyles(element, 31, 0.2, 0, '1rem', '0.1rem solid white', '-0.1rem', 14); // Corresponds to 100%
    }
  }
 

  // Utility function to apply styles
  function setStyles(element, translateX, scale, opacity, filter, outline, outlinerOffset, zIndex, id = '') {
    element.style.transform = `translateX(${translateX}vw) scale(${scale})`;
    element.style.opacity = opacity;
    element.style.filter = `blur(${filter})`;
    element.style.outline = `${outline}`;
    element.style.outlineOffset = `${outlinerOffset}`;
    element.style.zIndex = zIndex;
    element.id = id;

    
    //在初始透明度为0时，添加鼠标移入移出事件监听
    if (education_op == 0) {
      if (id && id === 'selectedBox') {
        element.addEventListener('mouseover', displayEducation);
        element.addEventListener('mouseout', removeEducation);
      } else {
        element.removeEventListener('mouseover', displayEducation);
        element.removeEventListener('mouseout', removeEducation);
      }
    }
  }
}

//用于滚动时更新成员内容的函数
function updateMemberContent(n) {
  //console.log('Members Data:', membersData[n]);
  if (n < 0 || n >= membersData.length) {
      console.log("Index out of range");
      return;
  }

  // 更新教育经历和学术成果
  updateEducationItems(n);
  updatePublicationItems(n);
  initializeAnimations();  // 重新初始化动画效果
}

//更新教育经历
function updateEducationItems(n) {
  //console.log(`Updating education items for index ${n}`);
  var educationHtml = '';
  var educationData = JSON.parse(membersData[n].education); // 假设教育数据以JSON字符串存储
  var awardsData = JSON.parse(membersData[n].awards); // 假设奖项数据以JSON字符串存储
  
  educationHtml += '<h3 class="moreDetails">教育经历<span class="englishTitle"> Education</span></h3>';
  if(!educationData){educationHtml += '<p class="noData fadein">暂无数据</p>';}else{
    //console.log(educationData);
    educationData.forEach(function(edu) {
      let edus = edu.split("%");
      educationHtml += '<div class="educationItem"><p class="timePoint">' + edus[0] + '</p><p class="event">' + edus[1] +'<br/>'+ edus[2] + '</p></div>';
    });
  }
  educationHtml += '<h3 class="moreDetails">曾获奖项<span class="englishTitle"> Awards</span></h3>';
  if(!awardsData){educationHtml += '<p class="noData fadein">暂无数据</p>';}else{
    awardsData.forEach(function(awa) {
      let awas = awa.split("%");
      educationHtml += '<div class="educationItem"><p class="timePoint">' + awas[0] + '</p><p class="event">' + awas[1] +'<br/>'+ awas[2] + '</p></div>';
    });
  }
  document.querySelector('.education').innerHTML = educationHtml;
  drawSlashes("timePoint", "#DB5C5C", 8);
}

//更新学术成果
function updatePublicationItems(n) {
  var publicationHtml = '<h3 class="moreDetails">学术成果<span class="englishTitle"> Publication</span></h3>';

  var member = membersData[n];
  if (member.output_titles) {
    var output_id = member.output_id.split("% ");
    var output_titles = member.output_titles.split("% ");
    var author_names = member.author_names.split("% ");
    var other_authors = member.other_authors.split("% ");
    var journals = member.journals.split("% ");
    var times = member.times.split("% ");
    var volumn_and_pages = member.volumn_and_pages.split("% ");
    //console.log(output_titles, author_names, other_authors, journals, times, volumn_and_pages);
    for (var i = 0; i < output_titles.length; i++) {
      //console.log(output_titles[i], author_names[i], other_authors[i], journals[i], times[i], volumn_and_pages[i]);
      var authors = author_names[i];
      if(other_authors[i] != ' '){
        authors += ','+ other_authors[i];
      }
      publicationHtml += `
      <div class="articleBox fadein" id="memberArticleBox" onclick="window.location.href='outputs.php?output_id=${output_id[i]}'">
          <h2>${output_titles[i]}</h2>
          <p class="authors">${authors}</p>
          <div class="journalBox">
              <p class="journalName">${journals[i]}</p>
              <p class="journalDetails">
                  <span class="year">${times[i]}</span>, ${volumn_and_pages[i]}
              </p>
          </div>
      </div>`;    
    }
  }else{
    publicationHtml += '<p class="noData fadein">暂无数据</p>';
  }
  document.querySelector('.personalOutputs').innerHTML = publicationHtml;
  drawSlashes("journalBox", "white", 15);
}