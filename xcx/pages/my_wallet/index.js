//index.js
//获取应用实例
const app = getApp()

Page({
	data: {
		motto: '赞赏看图',
		userInfo: {},
		hasUserInfo: false,
		canIUse: wx.canIUse('button.open-type.getUserInfo'),
		imgUrls: [
			{ url: 'http://img02.tooopen.com/images/20150928/tooopen_sy_143912755726.jpg', text: '111' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175866434296.jpg', text: '222' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175833047715.jpg', text: '789' }
		],
		isSelect1: 'active',
		isSelect2: '',
		isDisplay1: 'block',
		isDisplay2: 'hidden',
		indicatorDots: false,
		autoplay: false,
		interval: 5000,
		duration: 1000
	},
	changeIndicatorDots: function (e) {
		this.setData({
			indicatorDots: !this.data.indicatorDots
		})
	},
	changeAutoplay: function (e) {
		this.setData({
			autoplay: !this.data.autoplay
		})
	},
	intervalChange: function (e) {
		this.setData({
			interval: e.detail.value
		})
	},
	durationChange: function (e) {
		this.setData({
			duration: e.detail.value
		})
	},
	//事件处理函数
	bindViewTap: function () {
		wx.navigateTo({
			url: '../logs/logs'
		})
	},
	//是否显示
	change_vip: function () {
		this.setData({
			isSelect1: 'no',
			isSelect2: 'active',
			isDisplay1: 'hidden',
			isDisplay2: 'block'
		});
	},
	change_index: function () {
		this.setData({
			isSelect1: 'active',
			isSelect2: 'no',
			isDisplay1: 'block',
			isDisplay2: 'hidden'
		});
	},
	//提交提现
	submit:function(e){
		var that = this;
		//console.log(e.detail.value.money );
		if(e.detail.value.money == ""){
			wx.showToast({
				title: '请输入提现金额',
				image: '/icon/tip.png',
				duration: 1500
			})
			setTimeout(function () {
				wx.hideToast()
			}, 2000)
		} else if (e.detail.value.money > that.data.userInfo.money){
			console.log(that.data.userInfo.money);
			wx.showToast({
				title: '提现金额过大',
				image: '/icon/tip.png',
				duration: 1500
			})
			setTimeout(function () {
				wx.hideToast()
			}, 2000)
		} else if (e.detail.value.money < 10){
			wx.showToast({
				title: '最少提现10元',
				image: '/icon/tip.png',
				duration: 1500
			})
			setTimeout(function () {
				wx.hideToast()
			}, 2000)
		}else{
			app.connect("tixianPost.php", { 
				uid: app.globalData.userInfo.id, 
				money: e.detail.value.money
			},
			function(e){
				if (e == "success"){
					wx.showToast({
						title: '提现申请成功',
						image: '/icon/tip.png',
						duration: 2000
					})
					setTimeout(function () {
						wx.navigateTo({
							url: '/pages/my_wallet/tixian_log'
						})
					}, 2000)
					
					
				}else{
					wx.showToast({
						title: e,
						image: '/icon/tip.png',
						duration: 1500
					})
					console.log(e);
				}
				
		
			});
		}
	},
	onShow: function () {
		var that = this;
		that.setData({
			userInfo: app.globalData.userInfo,
		})
		setTimeout(function () {
			that.setData({
				userInfo: app.globalData.userInfo,
			})
		}, 1000)
	},
	onPullDownRefresh:function(){
		app.login();
		this.onShow();
	},
	onReady:function(){
		app.login();
		this.onShow();
	}
})
