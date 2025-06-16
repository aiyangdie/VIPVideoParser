<?php
// 定义解析接口
$parseApis = [
    'xmflv' => 'https://jx.xmflv.cc/?url=',
    'v9j' => 'http://v9j.net/?url='
];

// 默认选择的接口
$selectedApi = 'xmflv';

// 要解析的URL
$videoUrl = '';

// 解析后的URL
$parseUrl = '';

// 是否显示视频
$showVideo = false;

// 处理表单提交
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['videoUrl']) && !empty($_POST['videoUrl'])) {
        $videoUrl = trim($_POST['videoUrl']);
        
        // 验证URL
        if (filter_var($videoUrl, FILTER_VALIDATE_URL)) {
            // 获取选择的接口
            if (isset($_POST['parseApi']) && array_key_exists($_POST['parseApi'], $parseApis)) {
                $selectedApi = $_POST['parseApi'];
            }
            
            // 构建解析URL
            $parseUrl = $parseApis[$selectedApi] . urlencode($videoUrl);
            $showVideo = true;
        } else {
            $error = '请输入有效的视频链接！';
        }
    } else {
        $error = '请输入视频链接！';
    }
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>视频解析网站 - PHP版</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .error-message {
            color: #e74c3c;
            background-color: #ffeaea;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>视频解析网站</h1>
            <p>支持各大视频网站VIP视频解析</p>
        </header>
        
        <form method="post" action="">
            <div class="search-box">
                <input type="text" id="videoUrl" name="videoUrl" placeholder="请输入需要解析的视频链接..." value="<?php echo htmlspecialchars($videoUrl); ?>">
                <div class="button-group">
                    <button type="submit" id="parseBtn">解析</button>
                    <button type="button" id="clearBtn">清除</button>
                </div>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <div class="parse-options">
                <h3>解析线路</h3>
                <div class="options-container">
                    <label class="option">
                        <input type="radio" name="parseApi" value="xmflv" <?php echo $selectedApi === 'xmflv' ? 'checked' : ''; ?>>
                        <span>线路一 (xmflv)</span>
                    </label>
                    <label class="option">
                        <input type="radio" name="parseApi" value="v9j" <?php echo $selectedApi === 'v9j' ? 'checked' : ''; ?>>
                        <span>线路二 (v9j)</span>
                    </label>
                </div>
            </div>
        </form>
        
        <div class="result-container">
            <?php if ($showVideo): ?>
                <div id="videoContainer" class="video-container">
                    <iframe id="videoFrame" src="<?php echo htmlspecialchars($parseUrl); ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            <?php else: ?>
                <div style="padding: 30px; text-align: center; color: #777;">
                    <p>请输入视频链接并点击"解析"按钮</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="instructions">
            <h3>使用说明</h3>
            <ol>
                <li>复制您想要观看的视频网站链接</li>
                <li>粘贴到上方输入框中</li>
                <li>选择解析线路</li>
                <li>点击"解析"按钮</li>
                <li>如遇到解析失败，请尝试更换解析线路</li>
            </ol>
        </div>
        
        <div class="supported-sites">
            <h3>支持的视频网站</h3>
            <div class="sites-grid">
                <div class="site">爱奇艺</div>
                <div class="site">腾讯视频</div>
                <div class="site">优酷</div>
                <div class="site">芒果TV</div>
                <div class="site">bilibili</div>
                <div class="site">搜狐视频</div>
                <div class="site">PPTV</div>
                <div class="site">乐视视频</div>
            </div>
        </div>
    </div>
    
    <footer>
        <p>免责声明：本站仅供学习交流使用，请勿用于商业用途。若有侵权，请联系删除。</p>
    </footer>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const videoUrlInput = document.getElementById('videoUrl');
            const clearBtn = document.getElementById('clearBtn');
            
            // 清除按钮点击事件
            clearBtn.addEventListener('click', function() {
                videoUrlInput.value = '';
            });
            
            // 自动填充剪贴板内容（如果是URL）
            if (navigator.clipboard && videoUrlInput.value === '') {
                navigator.clipboard.readText().then(function(clipText) {
                    try {
                        new URL(clipText);
                        videoUrlInput.value = clipText;
                    } catch (e) {
                        // 不是有效URL，忽略
                    }
                }).catch(function(err) {
                    // 剪贴板访问被拒绝或其他错误，忽略
                    console.log('无法访问剪贴板', err);
                });
            }
        });
    </script>
</body>
</html> 