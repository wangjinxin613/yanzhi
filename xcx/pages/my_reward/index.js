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
		data_list:{},
		my_data:{}
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
	//点击查看照片
	reward: function (e) {
		var lid = e.currentTarget.dataset.lid;
		var isReward = e.currentTarget.dataset.isreward;
		var src = e.currentTarget.dataset.src;
		if (isReward == '1') {
			//已经解锁的照片集合		
			this.ylimg(e.currentTarget.dataset.id, src);
		} else {
			wx.navigateTo({
				url: '/pages/reward/index?lid=' + lid,
			})
		}

	},
	//预览照片
	ylimg: function (lid, src) {
		var that = this;
		wx.previewImage({
			current: src,
			urls: that.data.data_list[lid].imgUrl // 需要预览的图片http链接列表
		})
	},
	onLoad: function () {
		var that = this;
		//首页列表数据
		app.getUserInfo(function (userInfo) {
			//更新数据
			that.setData({
				userInfo: userInfo
			})
			//我发出的赞赏
			app.connect("myReward.php", { uid: that.data.userInfo.id }, function (e) {
				that.setData({
					data_list: e.data
				})
			})
			//我收到的赞赏
			app.connect("myReceive.php", { uid: that.data.userInfo.id},function(e){
				that.setData({
					my_data: e.data
				})
				console.log(e);
			})
		})
		
	},
	onPullDownRefresh: function () {
		this.onLoad();
		wx.stopPullDownRefresh();
	}
})
