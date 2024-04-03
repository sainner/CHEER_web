
// 设置场景
const scene = new THREE.Scene();
// 设置相机
let camera;
let originalCameraPosition = new THREE.Vector3();//用以记录原始位置
let originalCameraRotation = new THREE.Euler();//用以记录原始朝向
// 设置渲染器
const renderer = new THREE.WebGLRenderer();
renderer.setClearColor(0xffffff);
// 设置渲染容器
const container = document.getElementById('modelContainer');
renderer.setSize(container.clientWidth, container.clientHeight);
container.appendChild(renderer.domElement);
// 设置灯光
const ambientLight = new THREE.AmbientLight(0xffffff, 0.94); // 使用半强度的白色环境光
scene.add(ambientLight);
// 设置雾气
scene.fog = new THREE.Fog(0xffffff, 40, 60);


//监听窗口大小变化
window.addEventListener('resize', onWindowResize, false);

function onWindowResize() {
    renderer.setSize(container.clientWidth, container.clientHeight);
    if (camera) { // 确保在camera初始化之后才调用
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
    }
}

// 从gltf.scene中获取模型
const loader = new THREE.GLTFLoader();
let city; 
loader.load('/model/city.glb', function(gltf) {
    scene.add(gltf.scene);
    // 假设模型是加载的场景中的第一个子对象
    scene.traverse(function(child) {
        if (child.name === 'city') {
            city = child;
        }
    });
    initialPosition.copy(city.position); // 记录初始位置
    camera = gltf.cameras[0];
    originalCameraPosition.copy(camera.position);//记录原始位置
    originalCameraRotation.copy(camera.rotation);//记录原始朝向
    animate();
});

//移动模型
// 定义速度和移动距离变量
const speed = 0.01; // 移动速度
let totalDistance = 0; // 移动的总距离
let initialPosition = new THREE.Vector3();// 初始位置

// 根据鼠标改变摄像机视角
// 定义鼠标位置变量
let mouseX = 0, mouseY = 0;
// 监听鼠标移动事件
document.addEventListener('mousemove', (event) => {
    // 计算鼠标位置相对于屏幕中心的偏移量
    mouseX = (event.clientX - window.innerWidth / 2);
    mouseY = (event.clientY - window.innerHeight / 2);
});
// 更新摄像机朝向的函数
function updateCamera() {
    // 当鼠标在窗口内部时，根据鼠标位置更新目标旋转
    const targetRotationX = originalCameraRotation.x - (mouseY * 0.0001);
    const targetRotationY = originalCameraRotation.y - (mouseX * 0.0001);

    // 使用一个较小的过渡因子来平滑更新摄像机旋转，避免过快跟随鼠标导致的抖动
    camera.rotation.x += (targetRotationX - camera.rotation.x) * 0.01;
    camera.rotation.y += (targetRotationY - camera.rotation.y) * 0.01;
}


// 动画函数
function animate() {
    requestAnimationFrame(animate);

    // 更新摄像机
    updateCamera();
    // 更新模型位置
    if (city) {
        // 使模型沿Y轴移动
        city.position.z += speed;
        totalDistance += speed;

        // 检查移动距离是否达到186m
        if (totalDistance >= 186) {
            city.position.copy(initialPosition); // 回到初始位置
            totalDistance = 0; // 重置移动距离
        }
    }
    renderer.render(scene, camera);
}

