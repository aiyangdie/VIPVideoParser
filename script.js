document.addEventListener('DOMContentLoaded', function() {
    // 获取DOM元素
    const videoUrlInput = document.getElementById('videoUrl');
    const parseBtn = document.getElementById('parseBtn');
    const clearBtn = document.getElementById('clearBtn');
    const videoFrame = document.getElementById('videoFrame');
    const videoContainer = document.getElementById('videoContainer');
    const loadingIndicator = document.getElementById('loadingIndicator');
    const parseApiOptions = document.getElementsByName('parseApi');
    
    // 解析按钮点击事件
    parseBtn.addEventListener('click', function() {
        parseVideo();
    });
    
    // 清除按钮点击事件
    clearBtn.addEventListener('click', function() {
        videoUrlInput.value = '';
        hideVideo();
    });
    
    // 回车键触发解析
    videoUrlInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            parseVideo();
        }
    });
    
    // 解析视频函数
    function parseVideo() {
        const videoUrl = videoUrlInput.value.trim();
        
        // 验证URL是否为空
        if (!videoUrl) {
            alert('请输入视频链接！');
            return;
        }
        
        // 验证URL格式
        if (!isValidUrl(videoUrl)) {
            alert('请输入有效的视频链接！');
            return;
        }
        
        // 获取选中的解析接口
        let selectedApi = '';
        for (const option of parseApiOptions) {
            if (option.checked) {
                selectedApi = option.value;
                break;
            }
        }
        
        // 显示加载指示器
        showLoading();
        
        // 构建解析URL
        const parseUrl = selectedApi + encodeURIComponent(videoUrl);
        
        // 设置iframe src并监听加载完成事件
        videoFrame.onload = function() {
            hideLoading();
            showVideo();
        };
        
        videoFrame.onerror = function() {
            hideLoading();
            alert('视频解析失败，请尝试更换解析线路！');
        };
        
        // 设置超时处理
        const timeout = setTimeout(function() {
            if (loadingIndicator.classList.contains('hidden') === false) {
                hideLoading();
                alert('视频加载超时，请尝试更换解析线路！');
            }
        }, 15000); // 15秒超时
        
        // 设置iframe src
        videoFrame.src = parseUrl;
    }
    
    // 显示加载指示器
    function showLoading() {
        loadingIndicator.classList.remove('hidden');
        videoContainer.classList.add('hidden');
    }
    
    // 隐藏加载指示器
    function hideLoading() {
        loadingIndicator.classList.add('hidden');
    }
    
    // 显示视频
    function showVideo() {
        videoContainer.classList.remove('hidden');
    }
    
    // 隐藏视频
    function hideVideo() {
        videoContainer.classList.add('hidden');
        videoFrame.src = '';
    }
    
    // 验证URL格式
    function isValidUrl(url) {
        try {
            new URL(url);
            return true;
        } catch (e) {
            return false;
        }
    }
    
    // 自动填充剪贴板内容（如果是URL）
    navigator.clipboard && navigator.clipboard.readText().then(function(clipText) {
        if (isValidUrl(clipText) && videoUrlInput.value === '') {
            videoUrlInput.value = clipText;
        }
    }).catch(function(err) {
        // 剪贴板访问被拒绝或其他错误，忽略
        console.log('无法访问剪贴板', err);
    });
}); 